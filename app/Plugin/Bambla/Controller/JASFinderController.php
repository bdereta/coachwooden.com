<?php

App::uses('AppController', 'Controller');

class JASFinderController extends BamblaAppController {
	
	public $components = array('RequestHandler');
	
	public function beforeFilter() {
		parent::beforeFilter();	
		$this->Auth->deny();
	}
	
	public function connector() {
		$files = $this->JASFinder->get_folder_contents();		
		$this->set(array('files' => $files, '_serialize' => 'files'));
			
	}

}
