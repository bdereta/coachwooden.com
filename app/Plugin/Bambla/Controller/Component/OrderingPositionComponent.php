<?php
App::uses('Component', 'Controller');

/**
 * Ordering Position Component
 *
 * Allows records ordering position to be manipulated
 * @param array $params ('id' => int, 'action' => [up/down], 'model' => 'string', 'PositionFieldName' => 'string', 'conditions' => 'array') 
 *
 */
 
class OrderingPositionComponent extends Component {
		
	public function init($params = array()) {
		$this->PositionFieldName = array_key_exists('PositionFieldName', $params) ? $params['PositionFieldName'] : 'ordering_position';
		$this->ModelName = array_key_exists('model', $params) ? $params['model'] : NULL;
		$this->ModelObject = ($this->ModelName) ? ClassRegistry::init($this->ModelName) : NULL;
		$this->ModelObject->id = array_key_exists('id', $params) ? $params['id'] : false;
		$this->Action = array_key_exists('action', $params) ? $params['action'] : NULL;
		$this->Conditions = array_key_exists('conditions', $params) ? $params['conditions'] : NULL;
		
	}
			
	public function ChangePositionReorder($params = array()) {
		if ($this->ChangePosition($params)) {
			if ($this->Reorder($params)) {
				return true;	
			}
		}	
	}
	
	public function ChangePosition($params = array()) {
		$this->init($params);
		$data = $this->ModelObject->find('first', array('fields' => array('id', $this->PositionFieldName), 'conditions' => array('id' => $this->ModelObject->id, $this->Conditions)));
		if ($this->Action == 'up') {
			$data[$this->ModelName][$this->PositionFieldName] -= 15;
		} else {
			$data[$this->ModelName][$this->PositionFieldName] += 15;
		}
		$this->ModelObject->save($data);
		return true;
	}
	
	public function Reorder($params = array()) {
		$this->init($params);
		$data = $this->ModelObject->find('all', array('conditions' => $this->Conditions, 'order' => array($this->PositionFieldName)));
		//$this->log(json_encode($data),'tracker');
		if (!empty($data)) {
			foreach($data as $count => $val) {
				//$this->log("Reorder Values - ACTIVE: ".json_encode($val[$this->ModelName]), 'tracker');
				$data[$count][$this->ModelName][$this->PositionFieldName] = ($count+1)*10;		
			}
		}
		$this->ModelObject->saveMany($data);
		return true;
	}
}