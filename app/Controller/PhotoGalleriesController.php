<?php
App::uses('AppController', 'Controller');
/**
 * PhotoGalleries Controller
 *
 * @property PhotoGallery $PhotoGallery
 * @property PaginatorComponent $Paginator
 * @property ImageProcessorComponent $ImageProcessor
 */
class PhotoGalleriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'ImageProcessor');

	public $uses = array('PhotoGallery','Bambla.Image');

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
		$this->PhotoGallery->recursive = 0;
		$this->set('photoGalleries', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PhotoGallery->exists($id)) {
			throw new NotFoundException(__('Invalid photo gallery'));
		}
		$options = array('conditions' => array('PhotoGallery.' . $this->PhotoGallery->primaryKey => $id));
		$this->set('photo gallery', $this->PhotoGallery->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//image upload params
		$params['uploadImages'] = $this->PhotoGallery->uploadImages;
		//process form data
		if ($this->request->is('post')) {
			//capture post data
			$params['requestData'] = $this->request->data['PhotoGallery'];
			//validate Images before upload
			$this->PhotoGallery->set($this->request->data);
			if (!$this->PhotoGallery->validates($this->PhotoGallery->validate)) {
				//display validation message
				$errors = $this->PhotoGallery->validationErrors;
			} else {
				//capture post data
				$params['requestData'] = $this->request->data['PhotoGallery'];
				//process images via Component
				$result = $this->ImageProcessor->process($params);
			}
		}
		//save data
		if ($this->Session->check('Bambla.postData')) {
			//capture session
			$session = $this->Session->read('Bambla.postData');
			$data['PhotoGallery'] = $session['uploadedData'];
			$this->Session->delete('Bambla.postData');	
			//save data to db
			if (isset($data) && array_key_exists('PhotoGallery', $data)) {
				$this->PhotoGallery->create();
				if ($this->PhotoGallery->save($data)) {
					$this->Session->setFlash(__('PhotoGallery has been saved!'), 'Bambla.green');
					return $this->redirect(array('action'=>'index'));	
				} else {
					$this->Session->setFlash(__('The photo gallery could not be saved. Please try again.'), 'Bambla.red');
				}
			}	
		}
		
		//data for view
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
		if (!$this->PhotoGallery->exists($id)) {
			throw new NotFoundException(__('Invalid photo gallery'));
		}
		//required for displaying existing image
		$params['model'] = 'PhotoGallery';
		//image upload params
		$params['uploadImages'] = $this->PhotoGallery->uploadImages;
		
		if ($this->request->is(array('post', 'put'))) {
			//check if user is trying to upload new image(s), otherwise keep the existing image
			foreach($this->request->data['PhotoGallery'] as $key => $val) {
				//check if new images are being uploaded
				if (is_array($val) && array_key_exists('tmp_name', $val)) {
					//no image
					if (empty($val['tmp_name'])) {
						//user will keep the existing image
						//remove the field from array to prevent overwritting of the existing value
						unset($this->request->data['PhotoGallery'][$key], $params['uploadImages'][$key]);
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
				if (!$this->{$params['model']}->validates($this->PhotoGallery->validate)) {
					//display validation message
					$errors = $this->PhotoGallery->validationErrors;
				} else {
					//capture post data
					$params['requestData'] = $this->request->data['PhotoGallery'];
					//process images via Component
					$result = $this->ImageProcessor->process($params);
				}
			}
		} 
		
		//save data
		if ($this->Session->check('Bambla.postData')) {
			//capture session
			$session = $this->Session->read('Bambla.postData');
			$data['PhotoGallery'] = $session['uploadedData'];
			$this->Session->delete('Bambla.postData');		
		}
		
		//save data to db
		if (isset($data)) {
			$this->PhotoGallery->create();
			if ($this->PhotoGallery->save($data)) {
				$this->Session->setFlash(__('PhotoGallery has been saved!'), 'Bambla.green');
				return $this->redirect(array('action'=>'index'));	
			} else {
				$this->Session->setFlash(__('The photo gallery could not be saved. Please try again.'), 'Bambla.red');
			}
		}
			
		//data for view
		$options = array('conditions' => array('PhotoGallery.' . $this->PhotoGallery->primaryKey => $id));
		$this->request->data = $this->PhotoGallery->find('first', $options);
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
		$this->PhotoGallery->id = $id;
		if (!$this->PhotoGallery->exists()) {
			throw new NotFoundException(__('Invalid '. strtolower($Model)));
		}
		$this->request->onlyAllow('post', 'delete');
		
		//delete image files
		$uploadImages = $this->PhotoGallery->uploadImages;
		foreach($uploadImages as $key=>$val) { 
			$fields[] = 'PhotoGallery.'.$key; 
		}
		$images = $this->PhotoGallery->find('all', array('fields' => $fields, 'conditions' => array('PhotoGallery.id' => $id), 'recursive' => -1));
		foreach($images[0]['PhotoGallery'] as $key=>$val) {
			@unlink('img/uploads/'.$val);	
		}
		
		if ($this->PhotoGallery->delete()) {
			$this->Session->setFlash(__('The photo gallery has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The photo gallery could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
