<?php
App::uses('AppController', 'Controller');
/**
 * ShareMemories Controller
 *
 * @property ShareMemory $ShareMemory
 * @property PaginatorComponent $Paginator
 */
class ShareMemoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
		$this->ShareMemory->recursive = 0;
		$this->set('shareMemories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ShareMemory->exists($id)) {
			throw new NotFoundException(__('Invalid share memory'));
		}
		$options = array('conditions' => array('ShareMemory.' . $this->ShareMemory->primaryKey => $id));
		$this->set('shareMemory', $this->ShareMemory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ShareMemory->create();
			if ($this->ShareMemory->save($this->request->data)) {
				$this->Session->setFlash(__('The share memory has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The share memory could not be saved. Please, try again.'), 'Bambla.red');
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
		if (!$this->ShareMemory->exists($id)) {
			throw new NotFoundException(__('Invalid share memory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ShareMemory->save($this->request->data)) {
				$this->Session->setFlash(__('The share memory has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The share memory could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('ShareMemory.' . $this->ShareMemory->primaryKey => $id));
			$this->request->data = $this->ShareMemory->find('first', $options);
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
		$this->ShareMemory->id = $id;
		if (!$this->ShareMemory->exists()) {
			throw new NotFoundException(__('Invalid share memory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ShareMemory->delete()) {
			$this->Session->setFlash(__('The share memory has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The share memory could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
