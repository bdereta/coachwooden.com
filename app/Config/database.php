<?php

class DATABASE_CONFIG {

	public $default = NULL;
	
	function __construct() {
        $this->default = (IS_PROD) ? $this->prod : $this->dev;
        //$this->default = $this->dev;
    }

	//development
	public $dev = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'coachwooden',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
	
	//production
	public $prod = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'coachwooden',
		'password' => '7jFGuwB8ya4Mczf',
		'database' => 'coachwooden',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
}