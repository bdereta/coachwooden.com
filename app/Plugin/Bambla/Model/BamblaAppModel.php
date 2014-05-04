<?php

App::uses('AppModel', 'Model');

class BamblaAppModel extends AppModel {

	public $adminNavigation = array(
		'Groups' => array(
			'link' => array('controller' => 'groups', 'action' => 'index'), 
			'sublinks' => array(
				'List All' => array('controller' => 'groups', 'action' => 'index'), 
				'Add New Group' => array('controller' => 'groups', 'action' => 'add')
			)
		),
		'SEO' => array(
			'link' => array('controller' => 'pages', 'action' => 'index'), 
			'sublinks' => array(
				'List All' => array('controller' => 'pages', 'action' => 'index'),
				'Add New Page' => array('controller' => 'pages', 'action' => 'add'),
			)
		),
		'Users' => array(
			'link' => array('controller' => 'users', 'action' => 'index'), 
			'sublinks' => array(
				'List All' => array('controller' => 'users', 'action' => 'index'), 
				'Add New User' => array('controller' => 'users', 'action' => 'add')
			)
		),
	);

}
