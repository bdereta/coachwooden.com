<?php
App::uses('AppController', 'Controller');
/**
 * Winners Controller
 *
 * @property Winner $Winner
 * @property PaginatorComponent $Paginator
 */
class WinnersController extends AppController {

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
		$this->Winner->recursive = 0;
		$this->set('winners', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Winner->exists($id)) {
			throw new NotFoundException(__('Invalid winner'));
		}
		$options = array('conditions' => array('Winner.' . $this->Winner->primaryKey => $id));
		$this->set('winner', $this->Winner->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Winner->create();
			if ($this->Winner->save($this->request->data)) {
				$this->Session->setFlash(__('The winner has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The winner could not be saved. Please, try again.'), 'Bambla.red');
			}
		}
		$winnerCategories = $this->Winner->WinnerCategory->find('list');
		$this->set(compact('winnerCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Winner->exists($id)) {
			throw new NotFoundException(__('Invalid winner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Winner->save($this->request->data)) {
				$this->Session->setFlash(__('The winner has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The winner could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('Winner.' . $this->Winner->primaryKey => $id));
			$this->request->data = $this->Winner->find('first', $options);
		}
		$winnerCategories = $this->Winner->WinnerCategory->find('list');
		$this->set(compact('winnerCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Winner->id = $id;
		if (!$this->Winner->exists()) {
			throw new NotFoundException(__('Invalid winner'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Winner->delete()) {
			$this->Session->setFlash(__('The winner has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The winner could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
