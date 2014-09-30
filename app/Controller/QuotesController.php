<?php
App::uses('AppController', 'Controller');
/**
 * Quotes Controller
 *
 * @property Quote $Quote
 * @property PaginatorComponent $Paginator
 */
class QuotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Bambla.OrderingPosition');

/**
 * beforeFilter method
 * exectures before every action
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'Bambla.bambla';
	}
	
	public function admin_reorder_position($id = NULL, $action = NULL) {
  		$result = $this->OrderingPosition->ChangePositionReorder(array(
  			'model' => Inflector::classify($this->params['controller']), 
  			'id' => $id, 
  			'action' => $action
  		));
  		if ($result) {
  			$this->Session->setFlash(__('Order position changed.'), 'Bambla.green');
  		} else {
  			$this->Session->setFlash(__('Order position error.'), 'Bambla.red');
  		}
 		return $this->redirect(array('action'=>'index'));
	}
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Quote->recursive = 0;
		$this->Paginator->settings = array('order' => array('ordering_position' => 'ASC'));
		$this->set('quotes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
		$this->set('quote', $this->Quote->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Quote->create();
			if ($this->Quote->save($this->request->data)) {
				$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
				$this->Session->setFlash(__('The quote has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'), 'Bambla.red');
			}
		}
		//data for view
		$quoteCategories = $this->Quote->QuoteCategory->find('list');
		$this->set(compact('params','quoteCategories'));

	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Quote->save($this->request->data)) {
				$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
				$this->Session->setFlash(__('The quote has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
			$this->request->data = $this->Quote->find('first', $options);
		}
		//data for view
		$quoteCategories = $this->Quote->QuoteCategory->find('list');
		$this->set(compact('params','quoteCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Quote->delete()) {
			$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
			$this->Session->setFlash(__('The quote has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The quote could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}}
