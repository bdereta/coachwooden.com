<?php
App::uses('AppModel', 'Model');
/**
 * Quote Model
 *
 * @property QuoteCategory $QuoteCategory
 */
class Quote extends AppModel {

	public $order  = "Quote.ordering_position";

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'QuoteCategory' => array(
			'className' => 'QuoteCategory',
			'foreignKey' => 'quote_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
