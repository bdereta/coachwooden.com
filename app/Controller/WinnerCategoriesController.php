<?php
App::uses('AppController', 'Controller');
/**
 * WinnerCategories Controller
 *
 * @property WinnerCategory $WinnerCategory
 * @property PaginatorComponent $Paginator
 */
class WinnerCategoriesController extends AppController {

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
		$this->WinnerCategory->recursive = 0;
		$this->set('winnerCategories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->WinnerCategory->exists($id)) {
			throw new NotFoundException(__('Invalid winner category'));
		}
		$options = array('conditions' => array('WinnerCategory.' . $this->WinnerCategory->primaryKey => $id));
		$this->set('winnerCategory', $this->WinnerCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->WinnerCategory->create();
			if ($this->WinnerCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The winner category has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The winner category could not be saved. Please, try again.'), 'Bambla.red');
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
		if (!$this->WinnerCategory->exists($id)) {
			throw new NotFoundException(__('Invalid winner category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WinnerCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The winner category has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The winner category could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('WinnerCategory.' . $this->WinnerCategory->primaryKey => $id));
			$this->request->data = $this->WinnerCategory->find('first', $options);
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
		$this->WinnerCategory->id = $id;
		if (!$this->WinnerCategory->exists()) {
			throw new NotFoundException(__('Invalid winner category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WinnerCategory->delete()) {
			$this->Session->setFlash(__('The winner category has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The winner category could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
