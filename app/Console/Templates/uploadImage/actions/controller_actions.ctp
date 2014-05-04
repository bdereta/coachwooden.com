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
		$this->set('<?php echo strtolower($singularHumanName); ?>', $this-><?php echo $currentModelName; ?>->find('first', $options));
	}

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
				$result = $this->ImageProcessor->process($params);
			}
		}
		//save data
		if ($this->Session->check('Bambla.postData')) {
			//capture session
			$session = $this->Session->read('Bambla.postData');
			$data['<?php echo $currentModelName; ?>'] = $session['uploadedData'];
			$this->Session->delete('Bambla.postData');	
			//save data to db
			if (isset($data) && array_key_exists('<?php echo $currentModelName; ?>', $data)) {
				$this-><?php echo $currentModelName; ?>->create();
				if ($this-><?php echo $currentModelName; ?>->save($data)) {
					$this->Session->setFlash(__('<?php echo $currentModelName; ?> has been saved!'), 'Bambla.green');
					return $this->redirect(array('action'=>'index'));	
				} else {
					$this->Session->setFlash(__('The <?php echo strtolower($singularHumanName); ?> could not be saved. Please try again.'), 'Bambla.red');
				}
			}	
		}
		
		//data for view
		$this->set(compact('params'));	
	}
	
/**
 * <?php echo $admin ?>edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */	
	public function <?php echo $admin ?>edit($id = null) {
		//record exists?
		if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		//required for displaying existing image
		$params['model'] = '<?php echo $currentModelName; ?>';
		//image upload params
		$params['uploadImages'] = $this-><?php echo $currentModelName; ?>->uploadImages;
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			foreach($this->request->data['<?php echo $currentModelName; ?>'] as $key => $val) {
				//check if new images are being uploaded
				if (is_array($val) && array_key_exists('tmp_name', $val)) {
					//no image
					if (empty($val['tmp_name'])) {
						//user will keep the existing image
						//remove the field from array to prevent overwritting of the existing value
						unset($this->request->data['<?php echo $currentModelName; ?>'][$key], $params['uploadImages'][$key]);
						$data = $this->request->data;
						//exit(debug($data));
					} else {
						//image file found
						$params['updateImages'] = true;	
					}
				}
			}	
		
			if (array_key_exists('updateImages',$params)) {
				//send form data to model for validation
				$this->{$params['model']}->set($this->request->data);
				//validate form data
				if (!$this->{$params['model']}->validates($this-><?php echo $currentModelName; ?>->validate)) {
					//display validation message
					$errors = $this-><?php echo $currentModelName; ?>->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['<?php echo $currentModelName; ?>'];
					//process images via Component
					$result = $this->ImageProcessor->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('Bambla.postData')) {
			//capture session
			$session = $this->Session->read('Bambla.postData');
			$data['<?php echo $currentModelName; ?>'] = $session['uploadedData'];
			$this->Session->delete('Bambla.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this-><?php echo $currentModelName; ?>->create();
			if ($this-><?php echo $currentModelName; ?>->save($data)) {
				$this->Session->setFlash(__('<?php echo $currentModelName; ?> has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('The <?php echo strtolower($singularHumanName); ?> could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id));
		$this->request->data = $this-><?php echo $currentModelName; ?>->find('first', $options);
		$this->set(compact('params'));
	}

/**
 * <?php echo $admin ?>delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin ?>delete($id = null) {
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('Invalid '. strtolower($Model)));
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
			$this->Session->setFlash(__('The <?php echo strtolower($singularHumanName); ?> has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The <?php echo strtolower($singularHumanName); ?> could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}