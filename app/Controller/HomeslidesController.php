<?php
App::uses('AppController', 'Controller');
/**
 * Homeslides Controller
 *
 * @property Homeslide $Homeslide
 * @property PaginatorComponent $Paginator
 * @property ImageTools.ImageToolsComponent $ImageTools.ImageTools
 */
class HomeslidesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('ImageTools.ImageTools');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'ImageTools.ImageTools', 'Bambla.OrderingPosition');

/**
 * beforeFilter method
 * exectures before every action
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'Bambla.bambla';
	}

	public function admin_reorder_position($id = NULL, $action = NULL) {
  		$result = $this->OrderingPosition->ChangePositionReorder(array(
  			'model' => Inflector::classify($this->params['controller']), 
  			'id' => $id, 
  			'action' => $action
  		));
  		if ($result) {
  			$this->Session->setFlash(__('Order position changed.'), 'Bambla.green');
  		} else {
  			$this->Session->setFlash(__('Order position error.'), 'Bambla.red');
  		}
		return $this->redirect(array('action'=>'index'));	
	}
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Homeslide->recursive = 0;
		$this->Paginator->settings = array('order' => array('ordering_position' => 'ASC'));
		$this->set('homeslides', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Homeslide->exists($id)) {
			throw new NotFoundException(__('Invalid homeslide'));
		}
		$options = array('conditions' => array('Homeslide.' . $this->Homeslide->primaryKey => $id));
		$this->set('homeslide', $this->Homeslide->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->Homeslide->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['Homeslide'];
			//validate Images before upload
			$this->Homeslide->set($this->request->data);
			if (!$this->Homeslide->validates($this->Homeslide->validate)) {
				//display validation message
				$errors = $this->Homeslide->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['Homeslide'];
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
				$data['Homeslide'] = $session['uploadedData'];
			}
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this->Homeslide->create();
				if ($multiple) {
					if ($this->Homeslide->saveMany($data)) {
						$this->Session->setFlash(__('Homeslide have been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Homeslide could not be saved. Please try again.'), 'Bambla.red');
					}
				} else {
					if ($this->Homeslide->save($data)) {
						$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
						$this->Session->setFlash(__('Homeslide has been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Homeslide could not be saved. Please try again.'), 'Bambla.red');
					}
				}
			}	
		}
		
		
		$this->set(compact('params'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		//record exists?
		if (!$this->Homeslide->exists($id)) {
			throw new NotFoundException(__('Invalid homeslide'));
		}
		
		//required for displaying existing images via helper
		$params['model'] = "Homeslide";
		
		//image upload params
		$params['uploadImages'] = $this->Homeslide->uploadImages;
		
		//disable multiple for editing	
		foreach($params['uploadImages'] as $fieldname=>$options){
			$params['uploadImages'][$fieldname]['multiple'] = false;
		}
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['Homeslide'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['Homeslide'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['Homeslide'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['Homeslide'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['Homeslide'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['Homeslide'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this->Homeslide->set($this->request->data);
				//validate form data
				if (!$this->Homeslide->validates($this->Homeslide->validate)) {
					//display validation message
					$errors = $this->Homeslide->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['Homeslide'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['Homeslide'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->Homeslide->create();
			if ($this->Homeslide->save($data)) {
				$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
				$this->Session->setFlash(__('Homeslide has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('Homeslide could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('Homeslide.' . $this->Homeslide->primaryKey => $id));
		$this->request->data = $this->Homeslide->find('first', $options);
		$this->set(compact('params'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Homeslide->id = $id;
		if (!$this->Homeslide->exists()) {
			throw new NotFoundException(__('Invalid homeslide'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->Homeslide->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'Homeslide.'.$key; 
		}
		$images = $this->Homeslide->find('all', array('fields' => $fields, 'conditions' => array('Homeslide.id' => $id), 'recursive' => -1));
		foreach($images[0]['Homeslide'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->Homeslide->delete()) {
			$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
			$this->Session->setFlash(__('Homeslide has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Homeslide could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
