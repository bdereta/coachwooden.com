<?php

class DATABASE_CONFIG {

	public $default = NULL;
	
	function __construct() {
				
		if (IS_PROD) {
			$this->default = $this->prod;
		} else {
			$this->default = $this->dev;
		}
		//pr($this->default);
    }

	//development
	public $dev = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'password',
		'database' => 'coachwooden',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
	
	//production
	public $prod = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'coachwooden.db.6256345.hostedresource.com',
		'login' => 'coachwooden',
		'password' => 'gC8xtHnyvFj9!',
		'database' => 'coachwooden',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
}

