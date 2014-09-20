<?php
App::uses('AppController', 'Controller');
/**
 * AwardFacts Controller
 *
 * @property AwardFact $AwardFact
 * @property PaginatorComponent $Paginator
 */
class AwardFactsController extends AppController {

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
		$this->AwardFact->recursive = 0;
		$this->set('awardFacts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AwardFact->exists($id)) {
			throw new NotFoundException(__('Invalid award fact'));
		}
		$options = array('conditions' => array('AwardFact.' . $this->AwardFact->primaryKey => $id));
		$this->set('awardFact', $this->AwardFact->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AwardFact->create();
			if ($this->AwardFact->save($this->request->data)) {
				$this->Session->setFlash(__('The award fact has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The award fact could not be saved. Please, try again.'), 'Bambla.red');
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
		if (!$this->AwardFact->exists($id)) {
			throw new NotFoundException(__('Invalid award fact'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AwardFact->save($this->request->data)) {
				$this->Session->setFlash(__('The award fact has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The award fact could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('AwardFact.' . $this->AwardFact->primaryKey => $id));
			$this->request->data = $this->AwardFact->find('first', $options);
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
		$this->AwardFact->id = $id;
		if (!$this->AwardFact->exists()) {
			throw new NotFoundException(__('Invalid award fact'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AwardFact->delete()) {
			$this->Session->setFlash(__('The award fact has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The award fact could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
