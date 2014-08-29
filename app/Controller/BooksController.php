<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 * @property ImageTools.ImageToolsComponent $ImageTools.ImageTools
 */
class BooksController extends AppController {

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
		$this->Book->recursive = 0;
		$this->set('books', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
		$this->set('book', $this->Book->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->Book->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['Book'];
			//validate Images before upload
			$this->Book->set($this->request->data);
			if (!$this->Book->validates($this->Book->validate)) {
				//display validation message
				$errors = $this->Book->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['Book'];
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
				$data['Book'] = $session['uploadedData'];
			}
			$this->Session->delete('ImageTools.postData');	
			//save data to db						
			if (!empty($data)) {
				$this->Book->create();
				if ($multiple) {
					if ($this->Book->saveMany($data)) {
						$this->Session->setFlash(__('Book have been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Book could not be saved. Please try again.'), 'Bambla.red');
					}
				} else {
					if ($this->Book->save($data)) {
						$this->Session->setFlash(__('Book has been saved!'), 'Bambla.green');
						return $this->redirect(array('action'=>'index'));	
					} else {
						$this->Session->setFlash(__('Book could not be saved. Please try again.'), 'Bambla.red');
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
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		//required for displaying existing images via helper
		$params['model'] = "Book";
		
		//image upload params
		$params['uploadImages'] = $this->Book->uploadImages;
		
		//disable multiple for editing	
		foreach($params['uploadImages'] as $fieldname=>$options){
			$params['uploadImages'][$fieldname]['multiple'] = false;
		}
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			//match up model against post data
			foreach($params['uploadImages'] as $key => $uploadImage) {
				//check if request data contains any of the image fields
				if (!empty($this->request->data['Book'][$key])) {
					//check if a file for the image field has been uploaded
					if (!empty($this->request->data['Book'][$key]['tmp_name'])) {
						//file exists and is not empty
						//there's at least one pair (it could be more, but it's enough to know there's at least one match)
						$params['updateImages'] = true;
					} else {
						//file exists, but it's empty - we need to remove it from the model and post array
						unset($this->request->data['Book'][$key], $params['uploadImages'][$key]);
					}
				} else {
					//check if the image field is using another image for source (like thumbnails use large image as their source)
					if (!empty($params['uploadImages'][$key]['source'])) {
						//check if the source field is not empty
						if(!empty($this->request->data['Book'][$params['uploadImages'][$key]['source']]['tmp_name'])) {
							$params['updateImages'] = true;	
						} else {
							//source field is empty, delete it from model and post array
							unset($this->request->data['Book'][$key], $params['uploadImages'][$key]);		
						}
					} else {					
						//the file doesn't match the model (it doesn't exist) and/or the source for another image is empty - remove them from model and post array
						unset($this->request->data['Book'][$key], $params['uploadImages'][$key]);	
					}
				}
				//if no images are selected for updating, assign data variable for saving
				$data = $this->request->data;
			}	
		
			if (!empty($params['updateImages'])) {
				//send form data to model for validation
				$this->Book->set($this->request->data);
				//validate form data
				if (!$this->Book->validates($this->Book->validate)) {
					//display validation message
					$errors = $this->Book->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['Book'];
					//process images via Component
					$result = $this->ImageTools->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('ImageTools.postData')) {
			//capture session
			$session = $this->Session->read('ImageTools.postData');
			$data['Book'] = $session['uploadedData'];
			$this->Session->delete('ImageTools.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->Book->create();
			if ($this->Book->save($data)) {
				$this->Session->setFlash(__('Book has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('Book could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
		$this->request->data = $this->Book->find('first', $options);
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
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->Book->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'Book.'.$key; 
		}
		$images = $this->Book->find('all', array('fields' => $fields, 'conditions' => array('Book.id' => $id), 'recursive' => -1));
		foreach($images[0]['Book'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('Book has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Book could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
