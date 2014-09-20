<?php
App::uses('AppController', 'Controller');
/**
 * Pyramids Controller
 *
 * @property Pyramid $Pyramid
 * @property PaginatorComponent $Paginator
 * @property ImageTools.ImageToolsComponent $ImageTools.ImageTools
 */
class PyramidsController extends AppController {

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
	public $components = array('Paginator', 'ImageTools.ImageTools');

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
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Pyramid->recursive = 0;
		$this->set('pyramids', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Pyramid->exists($id)) {
			throw new NotFoundException(__('Invalid pyramid'));
		}
		$options = array('conditions' => array('Pyramid.' . $this->Pyramid->primaryKey => $id));
		$this->set('pyramid', $this->Pyramid->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->Pyramid->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['Pyramid'];
			//validate Images before upload
			$this->Pyramid->set($this->request->data);
			if (!$this->Pyramid->validates($this->Pyramid->validate)) {
				//display validation message
				$errors = $this->Pyramid->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['Pyramid'];
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
				$data['Pyramid'] = $session['uploadedData'];
			}
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this->Pyramid->create();
				if ($multiple) {
					if ($this->Pyramid->saveMany($data)) {
						$this->Session->setFlash(__('Pyramid have been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Pyramid could not be saved. Please try again.'), 'Bambla.red');
					}
				} else {
					if ($this->Pyramid->save($data)) {
						$this->Session->setFlash(__('Pyramid has been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Pyramid could not be saved. Please try again.'), 'Bambla.red');
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
		if (!$this->Pyramid->exists($id)) {
			throw new NotFoundException(__('Invalid pyramid'));
		}
		//required for displaying existing images via helper
		$params['model'] = "Pyramid";
		
		//image upload params
		$params['uploadImages'] = $this->Pyramid->uploadImages;
		
		//disable multiple for editing	
		foreach($params['uploadImages'] as $fieldname=>$options){
			$params['uploadImages'][$fieldname]['multiple'] = false;
		}
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['Pyramid'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['Pyramid'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['Pyramid'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['Pyramid'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['Pyramid'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['Pyramid'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this->Pyramid->set($this->request->data);
				//validate form data
				if (!$this->Pyramid->validates($this->Pyramid->validate)) {
					//display validation message
					$errors = $this->Pyramid->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['Pyramid'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['Pyramid'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->Pyramid->create();
			if ($this->Pyramid->save($data)) {
				$this->Session->setFlash(__('Pyramid has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('Pyramid could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('Pyramid.' . $this->Pyramid->primaryKey => $id));
		$this->request->data = $this->Pyramid->find('first', $options);
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
		$this->Pyramid->id = $id;
		if (!$this->Pyramid->exists()) {
			throw new NotFoundException(__('Invalid pyramid'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->Pyramid->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'Pyramid.'.$key; 
		}
		$images = $this->Pyramid->find('all', array('fields' => $fields, 'conditions' => array('Pyramid.id' => $id), 'recursive' => -1));
		foreach($images[0]['Pyramid'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->Pyramid->delete()) {
			$this->Session->setFlash(__('Pyramid has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Pyramid could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
