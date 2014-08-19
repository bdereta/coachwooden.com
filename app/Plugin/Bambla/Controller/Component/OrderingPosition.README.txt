This document explains how to implement position ordering component for INDEX action (listing). 
There are two ways to implement the component:

a) with ACTIVE column
b) without ACTIVE column

____________________________________________________________________


A) - Implementing WITH active column:

1. Open the controller file (/app/Controlers/ExampleController.php)
2. Add 'Bambla.OrderingPostion' component to the controller:
		
	<?php public $components =  array('Bambla.OrderingPosition'); ?>
	
3. Add following method to Controller before admin_index() method:

	<?php 
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
	?>

4. Add the following line to Controller admin_index() method (above $this->set()):

	<? $this->Paginator->settings = array('order' => array('ordering_position' => 'ASC')); ?>
	
5. Add the following line to Controller admin_add() and admin_edit() right after SAVE action:

	<? 	//if ($this->Example->save($this->request->data)) {
		$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']), 'conditions' => array('active' => 1)));
	?>

6. Add the following line to Controller admin_delete() after DELETE action:

	<? 	//if ($this->Example->delete()) {
		$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller']), 'conditions' => array('active' => 1)));
	?>
	
7. Now open /app/Views/[Controller]/admin_index.ctp 

8. Remove the table header ID column (the first one) and replace it with ordering position column:

	<th><?php echo $this->Paginator->sort('ordering_position'); ?></th>
	
9. Add header column  for Ordering Actions and place it second, right after Ordering Position column:
	
	<th>Change Ordering</th>
	
10. Replace first data column (ID column) with the following:

	<td><?php if ($example['Example']['active']) : ?>
			<?php echo h($example['Example']['ordering_position']/10); ?>
		<?php endif; ?>&nbsp;
	</td>
	
11. Add following column right next to the previous one:

	<td><?php if ($example['Example']['active']) : ?>
			<?php echo $this->Html->link('<i class="icon-arrow-up"></i>', array('action' => 'reorder_position', $example['Example']['id'], 'up'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
			<?php echo $this->Html->link('<i class="icon-arrow-down"></i>', array('action' => 'reorder_position', $example['Example']['id'], 'down'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
		<?php endif; ?>&nbsp;
	</td>

12. Replace 'Example' variable with corresponding Model you're using.



_______________________________________________________________________________________



B) - Implementing WITHOUT active column:

1. Open the controller file (/app/Controlers/ExampleController.php)
2. Add 'Bambla.OrderingPostion' component to the controller:
		
	<?php public $components =  array('Bambla.OrderingPosition'); ?>
	
3. Add following method to Controller before admin_index() method:

	<?php 
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
	?>

4. Add the following line to Controller admin_index() method (above $this->set()):

	<? $this->Paginator->settings = array('order' => array('ordering_position' => 'ASC')); ?>
	
5. Add the following line to Controller admin_add() and admin_edit() right after SAVE action:

	<? 	//if ($this->Example->save($this->request->data)) {
		$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
	?>

6. Add the following line to Controller admin_delete() after DELETE action:

	<? 	//if ($this->Example->delete()) {
		$this->OrderingPosition->Reorder(array('model' => Inflector::classify($this->params['controller'])));
	?>
	
7. Now open /app/Views/[Controller]/admin_index.ctp 

8. Remove the table header ID column (the first one) and replace it with ordering position column:

	<th><?php echo $this->Paginator->sort('ordering_position'); ?></th>
	
9. Add header column  for Ordering Actions and place it second, right after Ordering Position column:
	
	<th>Change Ordering</th>
	
10. Replace first data column (ID column) with the following:

	<td><?php if ($example['Example']['active']) : ?>
			<?php echo h($example['Example']['ordering_position']/10); ?>
		<?php endif; ?>&nbsp;
	</td>
	
11. Add following column right next to the previous one:

	<td><?php if ($example['Example']['active']) : ?>
			<?php echo $this->Html->link('<i class="icon-arrow-up"></i>', array('action' => 'reorder_position', $example['Example']['id'], 'up'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
			<?php echo $this->Html->link('<i class="icon-arrow-down"></i>', array('action' => 'reorder_position', $example['Example']['id'], 'down'), array('escape' => false, 'class'=>'bambla_arrows')); ?>
		<?php endif; ?>&nbsp;
	</td>

12. Replace 'Example' variable with corresponding Model you're using.






