<?php
App::uses('AppModel', 'Model');
/**
 * WinnerCategory Model
 *
 * @property Winner $Winner
 */
class WinnerCategory extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Winner' => array(
			'className' => 'Winner',
			'foreignKey' => 'winner_category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Winner.year DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
