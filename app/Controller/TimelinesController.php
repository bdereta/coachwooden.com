<?php
App::uses('AppController', 'Controller');
/**
 * Timelines Controller
 *
 * @property Timeline $Timeline
 * @property PaginatorComponent $Paginator
 * @property ImageTools.ImageToolsComponent $ImageTools.ImageTools
 */
class TimelinesController extends AppController {

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
		$this->Timeline->recursive = 0;
		$this->set('timelines', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Timeline->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		$options = array('conditions' => array('Timeline.' . $this->Timeline->primaryKey => $id));
		$this->set('timeline', $this->Timeline->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->Timeline->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['Timeline'];
			//validate Images before upload
			$this->Timeline->set($this->request->data);
			if (!$this->Timeline->validates($this->Timeline->validate)) {
				//display validation message
				$errors = $this->Timeline->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['Timeline'];
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
				$data['Timeline'] = $session['uploadedData'];
			}
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this->Timeline->create();
				if ($multiple) {
					if ($this->Timeline->saveMany($data)) {
						$this->Session->setFlash(__('Timeline have been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Timeline could not be saved. Please try again.'), 'Bambla.red');
					}
				} else {
					if ($this->Timeline->save($data)) {
						$this->Session->setFlash(__('Timeline has been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Timeline could not be saved. Please try again.'), 'Bambla.red');
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
		if (!$this->Timeline->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		
		//required for displaying existing images via helper
		$params['model'] = "Timeline";
		
		//image upload params
		$params['uploadImages'] = $this->Timeline->uploadImages;
		
		//disable multiple for editing	
		foreach($params['uploadImages'] as $fieldname=>$options){
			$params['uploadImages'][$fieldname]['multiple'] = false;
		}
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['Timeline'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['Timeline'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['Timeline'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['Timeline'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['Timeline'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['Timeline'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this->Timeline->set($this->request->data);
				//validate form data
				if (!$this->Timeline->validates($this->Timeline->validate)) {
					//display validation message
					$errors = $this->Timeline->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['Timeline'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['Timeline'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->Timeline->create();
			if ($this->Timeline->save($data)) {
				$this->Session->setFlash(__('Timeline has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('Timeline could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('Timeline.' . $this->Timeline->primaryKey => $id));
		$this->request->data = $this->Timeline->find('first', $options);
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
		$this->Timeline->id = $id;
		if (!$this->Timeline->exists()) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->Timeline->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'Timeline.'.$key; 
		}
		$images = $this->Timeline->find('all', array('fields' => $fields, 'conditions' => array('Timeline.id' => $id), 'recursive' => -1));
		foreach($images[0]['Timeline'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->Timeline->delete()) {
			$this->Session->setFlash(__('Timeline has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Timeline could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
