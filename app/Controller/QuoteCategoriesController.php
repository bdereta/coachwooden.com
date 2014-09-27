<?php
App::uses('AppController', 'Controller');
/**
 * QuoteCategories Controller
 *
 * @property QuoteCategory $QuoteCategory
 * @property PaginatorComponent $Paginator
 */
class QuoteCategoriesController extends AppController {

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
		$this->QuoteCategory->recursive = 0;
		$this->set('quoteCategories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->QuoteCategory->exists($id)) {
			throw new NotFoundException(__('Invalid quote category'));
		}
		$options = array('conditions' => array('QuoteCategory.' . $this->QuoteCategory->primaryKey => $id));
		$this->set('quoteCategory', $this->QuoteCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->QuoteCategory->create();
			if ($this->QuoteCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The quote category has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote category could not be saved. Please, try again.'), 'Bambla.red');
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
		if (!$this->QuoteCategory->exists($id)) {
			throw new NotFoundException(__('Invalid quote category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QuoteCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The quote category has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote category could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('QuoteCategory.' . $this->QuoteCategory->primaryKey => $id));
			$this->request->data = $this->QuoteCategory->find('first', $options);
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
		$this->QuoteCategory->id = $id;
		if (!$this->QuoteCategory->exists()) {
			throw new NotFoundException(__('Invalid quote category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuoteCategory->delete()) {
			$this->Session->setFlash(__('The quote category has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The quote category could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
