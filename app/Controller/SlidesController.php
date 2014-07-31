<?php
App::uses('AppController', 'Controller');
/**
 * Slides Controller
 *
 * @property Slide $Slide
 * @property PaginatorComponent $Paginator
 */
class SlidesController extends AppController {

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
		$this->Slide->recursive = 0;
		$this->set('slides', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
		$this->set('slide', $this->Slide->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Slide->create();
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slide could not be saved. Please, try again.'), 'Bambla.red');
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
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Slide->save($this->request->data)) {
				$this->Session->setFlash(__('The slide has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slide could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
			$this->request->data = $this->Slide->find('first', $options);
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
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Slide->delete()) {
			$this->Session->setFlash(__('The slide has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The slide could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
