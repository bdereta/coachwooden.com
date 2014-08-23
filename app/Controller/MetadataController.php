<?php
App::uses('AppController', 'Controller');
/**
 * Metadata Controller
 *
 * @property Metadata $Metadata
 * @property PaginatorComponent $Paginator
 */
class MetadataController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * beforeFilter method
 *
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
		$this->Metadata->recursive = 0;
		$this->set('metadata', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Metadata->exists($id)) {
			throw new NotFoundException(__('Invalid Meta data'));
		}
		$options = array('conditions' => array('Metadata.' . $this->Metadata->primaryKey => $id));
		$this->set('metadata', $this->Metadata->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Metadata->create();
			if ($this->Metadata->save($this->request->data)) {
				$this->Metadata->ClearCache('metum');
				$this->Session->setFlash(__('The meta data has been saved.'), 'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta data could not be saved. Please, try again.'), 'Bambla.red');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if ($id == 1) {
			//disable name editing for default
			$this->set('readOnly', true);	
		}
		if (!$this->Metadata->exists($id)) {
			throw new NotFoundException(__('Invalid meta data'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Metadata->save($this->request->data)) {
				$this->Metadata->ClearCache('metum');
				$this->Session->setFlash(__('The meta data has been saved.'), 'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta data could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('Metadata.' . $this->Metadata->primaryKey => $id));
			$this->request->data = $this->Metadata->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if ($id == '1') {
			$this->Session->setFlash(__('Default meta data cannot be deleted!'), 'Bambla.red');
			return $this->redirect(array('action' => 'index')); 
		}
		$this->Metadata->id = $id;
		if (!$this->Metadata->exists()) {
			throw new NotFoundException(__('Invalid meta data'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Metadata->delete()) {
			$this->Metadata->ClearCache('metum');
			$this->Session->setFlash(__('The meta data has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The meta data could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
