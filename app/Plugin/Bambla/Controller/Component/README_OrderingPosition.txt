<?php


class Example {

/// HOW TO USE IN A CONTROLLER: 

	public $components =  array('Bambla.OrderingPosition');

	public function admin_reorder_position($id = NULL, $action = NULL) {
		$result = $this->OrderingPosition->ChangePositionReorder(array(
			'model' => Inflector::classify($this->params['controller']), 
			'id' => $id, 
			'action' => $action,
			'conditions' => array('active' => 1) // only if table has active field
		));
		if ($result) {
			$this->Session->setFlash(__('Order position changed.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('Order position error.'), 'Bambla.red');
		}
		return $this->redirect($this->referer());
	}	
	
	//public function admin_index() {
		$this->Paginator->settings = array('order' => array('ordering_position' => 'ASC'));
		//$this->set('sliders', $this->Paginator->paginate());
		$this->Paginator->settings = array(
			'order' => array('ordering_position' => 'ASC'),
		);
		$this->set('sliders', $this->Paginator->paginate());
	//}
	
	//public function admin_add() {
	//	if ($this->request->is('post')) {
	//		$this->Example->create();
	//		if ($this->Example->save($this->request->data)) {
				$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']),'conditions' => array('active' => 1)));
	//			$this->Session->setFlash(__('The Example has been saved.'),'Bambla.green');
	//			return $this->redirect(array('action' => 'index'));
	//		} else {
	//			$this->Session->setFlash(__('The Example could not be saved. Please, try again.'), 'Bambla.red');
	//		}
	//	}
	//}
	
	//public function admin_edit($id = null) {
//		if (!$this->Example->exists($id)) {
//			throw new NotFoundException(__('Invalid Example'));
//		}
//		if ($this->request->is(array('post', 'put'))) {
//			if ($this->Example->save($this->request->data)) {
			$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']),'conditions' => array('active' => 1)));
//				$this->Session->setFlash(__('The Example has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The Example could not be saved. Please, try again.'));
//			}
//		} else {
//			$options = array('conditions' => array('Order.' . $this->Example->primaryKey => $id));
//			$this->request->data = $this->Example->find('first', $options);
//		}
//	}
	
//	public function admin_delete($id = null) {
//		$this->Example->id = $id;
//		if (!$this->Example->exists()) {
//			throw new NotFoundException(__('Invalid Example'));
//		}
//		$this->request->onlyAllow('post', 'delete');
//		if ($this->Example->delete()) {
			$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']),'conditions' => array('active' => 1)));
//			$this->Session->setFlash(__('The Example has been deleted.'), 'Bambla.green');
//		} else {
//			$this->Session->setFlash(__('The Example could not be deleted. Please, try again.'), 'Bambla.red');
//		}
//		return $this->redirect(array('action' => 'index'));
//	}
	
}

// HOW TO APPLY IN ADMIN VIEW/INDEX: 
// HOW TO APPLY IN ADMIN VIEW: 
?>

<table cellpadding="0" cellspacing="0">
	<tr>
		<!-- REMOVE ID AND REPLACE THE FIRST COLUMN WITH ORDERING POSITION -->			
		<th><?php echo $this->Paginator->sort('ordering_position'); ?></th>
		<!--<th><?php //echo $this->Paginator->sort('name'); ?></th>-->
		<th>Change Ordering</th>
		<!--<th><?php //echo $this->Paginator->sort('active'); ?></th>
		<th class="actions"><?php //echo __('Actions'); ?></th>-->
	</tr>
	<?php foreach ($examples as $example): ?>
	<tr>
		<td><?php if ($example['Example']['active']) : ?>
				<?php echo h($example['Example']['ordering_position']/10); ?>
			<?php endif; ?>&nbsp;
		</td>
		<!--<td><?php //echo h($example['Example']['name']); ?>&nbsp;</td>-->
		<td><?php if ($example['Example']['active']) : ?>
				<?php echo $this->Html->link('<i class="icon-arrow-up"></i>', array('action' => 'reorder_position', $example['Example']['id'], 'up'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
				<?php echo $this->Html->link('<i class="icon-arrow-down"></i>', array('action' => 'reorder_position', $example['Example']['id'], 'down'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
			<?php endif; ?>&nbsp;
		</td>
	</tr>
<?php endforeach; ?>
	</table>

