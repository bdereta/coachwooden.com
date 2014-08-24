<?php
/**
 * Bake Template for Controller action generation.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.actions
 * @since         CakePHP(tm) v 1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

/**
 * beforeFilter method
 * exectures before every action
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'Bambla.bambla';
	}

/**
 * <?php echo $admin ?>index method
 *
 * @return void
 */
	public function <?php echo $admin ?>index() {
		$this-><?php echo $currentModelName; ?>->recursive = 0;
		$this->set('<?php echo $pluralName ?>', $this->Paginator->paginate());
	}

/**
 * <?php echo $admin ?>view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin ?>view($id = null) {
		if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		$options = array('conditions' => array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id));
		$this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->find('first', $options));
	}

<?php $compact = array(); ?>
/**
 * <?php echo $admin ?>add method
 *
 * @return void
 */
	public function <?php echo $admin ?>add() {
		//image upload params
		$params['uploadImages'] = $this-><?php echo $currentModelName; ?>->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['<?php echo $currentModelName; ?>'];
			//validate Images before upload
			$this-><?php echo $currentModelName; ?>->set($this->request->data);
			if (!$this-><?php echo $currentModelName; ?>->validates($this-><?php echo $currentModelName; ?>->validate)) {
				//display validation message
				$errors = $this-><?php echo $currentModelName; ?>->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['<?php echo $currentModelName; ?>'];
				//process images via Component
				$result = $this->ImageTools->process($params);
			}
		}
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$multiple = $session['multiple'];
			if ($multiple) {
				$data = $session['uploadedData'];
			} else {
				$data['<?php echo $currentModelName; ?>'] = $session['uploadedData'];
			}
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this-><?php echo $currentModelName; ?>->create();
				if ($multiple) {
					if ($this-><?php echo $currentModelName; ?>->saveMany($data)) {
						$this->Session->setFlash(__('<?php echo $currentModelName; ?> have been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('<?php echo $currentModelName; ?> could not be saved. Please try again.'), 'Bambla.red');
					}
				} else {
					if ($this-><?php echo $currentModelName; ?>->save($data)) {
						$this->Session->setFlash(__('<?php echo $currentModelName; ?> has been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('<?php echo $currentModelName; ?> could not be saved. Please try again.'), 'Bambla.red');
					}
				}
			}	
		}
		
		
<?php
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact('params',".join(', ', $compact)."));\n";
	endif;
?>
	}

<?php $compact = array(); ?>
/**
 * <?php echo $admin ?>edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>edit($id = null) {
		//record exists?
		if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		//required for displaying existing images via helper
		$params['model'] = "<?php echo $currentModelName; ?>";
		
		//image upload params
		$params['uploadImages'] = $this-><?php echo $currentModelName; ?>->uploadImages;
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['<?php echo $currentModelName; ?>'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['<?php echo $currentModelName; ?>'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['<?php echo $currentModelName; ?>'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['<?php echo $currentModelName; ?>'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['<?php echo $currentModelName; ?>'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['<?php echo $currentModelName; ?>'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this-><?php echo $currentModelName; ?>->set($this->request->data);
				//validate form data
				if (!$this-><?php echo $currentModelName; ?>->validates($this-><?php echo $currentModelName; ?>->validate)) {
					//display validation message
					$errors = $this-><?php echo $currentModelName; ?>->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['<?php echo $currentModelName; ?>'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['<?php echo $currentModelName; ?>'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this-><?php echo $currentModelName; ?>->create();
			if ($this-><?php echo $currentModelName; ?>->save($data)) {
				$this->Session->setFlash(__('<?php echo $currentModelName; ?> has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('<?php echo $currentModelName; ?> could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id));
		$this->request->data = $this-><?php echo $currentModelName; ?>->find('first', $options);
<?php
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact('params',".join(', ', $compact)."));\n";
	endif;
?>
	}

/**
 * <?php echo $admin ?>delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>delete($id = null) {
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this-><?php echo $currentModelName; ?>->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = '<?php echo $currentModelName; ?>.'.$key; 
		}
		$images = $this-><?php echo $currentModelName; ?>->find('all', array('fields' => $fields, 'conditions' => array('<?php echo $currentModelName; ?>.id' => $id), 'recursive' => -1));
		foreach($images[0]['<?php echo $currentModelName; ?>'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this-><?php echo $currentModelName; ?>->delete()) {
			$this->Session->setFlash(__('<?php echo $currentModelName; ?> has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('<?php echo $currentModelName; ?> could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}