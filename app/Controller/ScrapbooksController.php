<?php
App::uses('AppController', 'Controller');
/**
 * Scrapbooks Controller
 *
 * @property Scrapbook $Scrapbook
 * @property PaginatorComponent $Paginator
 * @property ImageTools.ImageToolsComponent $ImageTools.ImageTools
 */
class ScrapbooksController extends AppController {

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
		$this->Scrapbook->recursive = 0;
		$this->set('scrapbooks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Scrapbook->exists($id)) {
			throw new NotFoundException(__('Invalid scrapbook'));
		}
		$options = array('conditions' => array('Scrapbook.' . $this->Scrapbook->primaryKey => $id));
		$this->set('scrapbook', $this->Scrapbook->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->Scrapbook->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['Scrapbook'];
			//validate Images before upload
			$this->Scrapbook->set($this->request->data);
			if (!$this->Scrapbook->validates($this->Scrapbook->validate)) {
				//display validation message
				$errors = $this->Scrapbook->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['Scrapbook'];
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
				$data['Scrapbook'] = $session['uploadedData'];
			}
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this->Scrapbook->create();
				if ($multiple) {
					if ($this->Scrapbook->saveMany($data)) {
						$this->Session->setFlash(__('Scrapbook have been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Scrapbook could not be saved. Please try again.'), 'Bambla.red');
					}
				} else {
					if ($this->Scrapbook->save($data)) {
						$this->Session->setFlash(__('Scrapbook has been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Scrapbook could not be saved. Please try again.'), 'Bambla.red');
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
		if (!$this->Scrapbook->exists($id)) {
			throw new NotFoundException(__('Invalid scrapbook'));
		}
		
		//required for displaying existing images via helper
		$params['model'] = "Scrapbook";
		
		//image upload params
		$params['uploadImages'] = $this->Scrapbook->uploadImages;
		
		//disable multiple for editing	
		foreach($params['uploadImages'] as $fieldname=>$options){
			$params['uploadImages'][$fieldname]['multiple'] = false;
		}
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['Scrapbook'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['Scrapbook'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['Scrapbook'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['Scrapbook'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['Scrapbook'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['Scrapbook'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this->Scrapbook->set($this->request->data);
				//validate form data
				if (!$this->Scrapbook->validates($this->Scrapbook->validate)) {
					//display validation message
					$errors = $this->Scrapbook->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['Scrapbook'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['Scrapbook'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->Scrapbook->create();
			if ($this->Scrapbook->save($data)) {
				$this->Session->setFlash(__('Scrapbook has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('Scrapbook could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('Scrapbook.' . $this->Scrapbook->primaryKey => $id));
		$this->request->data = $this->Scrapbook->find('first', $options);
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
		$this->Scrapbook->id = $id;
		if (!$this->Scrapbook->exists()) {
			throw new NotFoundException(__('Invalid scrapbook'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->Scrapbook->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'Scrapbook.'.$key; 
		}
		$images = $this->Scrapbook->find('all', array('fields' => $fields, 'conditions' => array('Scrapbook.id' => $id), 'recursive' => -1));
		foreach($images[0]['Scrapbook'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->Scrapbook->delete()) {
			$this->Session->setFlash(__('Scrapbook has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Scrapbook could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
