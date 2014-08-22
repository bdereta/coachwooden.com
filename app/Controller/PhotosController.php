<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 * @property PaginatorComponent $Paginator
 * @property ImageTools.ImageToolsComponent $ImageTools.ImageTools
 */
class PhotosController extends AppController {

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
	public $uses = array('Photo');

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
		$this->Photo->recursive = 0;
		$this->set('photos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->set('photo', $this->Photo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->Photo->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['Photo'];
			//validate Images before upload
			$this->Photo->set($this->request->data);
			if (!$this->Photo->validates($this->Photo->validate)) {
				//display validation message
				$errors = $this->Photo->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['Photo'];
				//process images via Component
				$result = $this->ImageTools->prepare($params);
			}
		}
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this->Photo->create();
				if ($this->Photo->saveMany($data)) {
					$this->Session->setFlash(__('Photo has been saved!'), 'Bambla.green');
					return $this->redirect(array('action'=>'index'));	
				} else {
					$this->Session->setFlash(__('The photo could not be saved. Please try again.'), 'Bambla.red');
				}
			}	
		}
		
		//data for view
		$albums = $this->Photo->Album->find('list');
		$this->set(compact('params','albums'));
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
		if (!$this->Photo->exists($id)) {
			throw new NotFoundException(__('Invalid photo'));
		}
		//required for displaying existing images via helper
		$params['model'] = "Photo";
		
		//image upload params
		$params['uploadImages'] = $this->Photo->uploadImages;
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['Photo'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['Photo'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['Photo'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['Photo'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['Photo'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['Photo'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this->Photo->set($this->request->data);
				//validate form data
				if (!$this->Photo->validates($this->Photo->validate)) {
					//display validation message
					$errors = $this->Photo->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['Photo'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['Photo'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->Photo->create();
			if ($this->Photo->save($data)) {
				$this->Session->setFlash(__('Photo has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('Photo.' . $this->Photo->primaryKey => $id));
		$this->request->data = $this->Photo->find('first', $options);
		$albums = $this->Photo->Album->find('list');
		$this->set(compact('params','albums', 'albums'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid '. strtolower($Model)));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->Photo->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'Photo.'.$key; 
		}
		$images = $this->Photo->find('all', array('fields' => $fields, 'conditions' => array('Photo.id' => $id), 'recursive' => -1));
		foreach($images[0]['Photo'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->Photo->delete()) {
			$this->Session->setFlash(__('The photo has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The photo could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
