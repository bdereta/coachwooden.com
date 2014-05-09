


>>>> HOW TO USE IN A CONTROLLER: 

	public $components =  array('Bambla.OrderingPosition');

	public function admin_reorder_position($id = NULL, $action = NULL) {
		$result = $this->OrderingPosition->ChangePositionReorder(array(
			'model' => Inflector::classify($this->params['controller']), 
			'id' => $id, 
			'action' => $action,
			'conditions' => array('active' => 1)
		));
		if ($result) {
			$this->Session->setFlash(__('Order position changed.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Order position error.'), 'Bambla.red');
		}
		return $this->redirect($this->referer());
	}	
	
	public function admin_index() {
		$this->Order->recursive = 0;
		$this->Paginator->settings = array(
			'order' => array('active' => 'DESC', 'ordering_position' => 'ASC'),
		);
		$this->set('orders', $this->Paginator->paginate());
	}
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']),'conditions' => array('active' => 1)));
				$this->Session->setFlash(__('The Example has been saved.'),'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Example could not be saved. Please, try again.'), 'Bambla.red');
			}
		}
	}
	
	public function admin_edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid Example'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']),'conditions' => array('active' => 1)));
				$this->Session->setFlash(__('The Example has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Example could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
	}
	
	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid Example'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Order->delete()) {
			$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']),'conditions' => array('active' => 1)));
			$this->Session->setFlash(__('The Example has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The Example could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
	


>>>> HOW TO USE IN A VIEW: 

<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ordering_position'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th>Change Ordering</th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php if ($order['Example']['active']) : ?>
				<?php echo h($order['Example']['ordering_position']/10); ?>
			<?php endif; ?>&nbsp;
		</td>
		<td><?php echo h($order['Example']['name']); ?>&nbsp;</td>
		<td><?php if ($order['Example']['active']) : ?>
				<?php echo $this->Html->link('Up', array('action' => 'reorder_position', $order['Example']['id'], 'up')); ?>
				<?php echo $this->Html->link('Down', array('action' => 'reorder_position', $order['Example']['id'], 'down')); ?>
			<?php endif; ?>&nbsp;
		</td>
	</tr>
<?php endforeach; ?>
	</table>

