<?php
App::uses('AppModel', 'Model');
/**
 * Winner Model
 *
 * @property WinnerCategory $WinnerCategory
 */
class Winner extends AppModel {

	public $order  = "Winner.year desc";

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'WinnerCategory' => array(
			'className' => 'WinnerCategory',
			'foreignKey' => 'winner_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
