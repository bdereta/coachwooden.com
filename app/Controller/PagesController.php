<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {
	
	public $components = array('Security');
	public $uses = array('PhotoGallery','Book');
	public $helpers = array();
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
		//prevent CSRF attacks
		$this->Security->blackHoleCallback = 'blackhole';
	}
	
	//redirect CSRF attacks to referer
	public function blackhole($type) {
		return $this->redirect($this->referer());
	}
	
	public function home() {
		$books = $this->Book->find('all', array('order' => array('ordering_position')));
		$this->set(compact('books'));		
	}

	public function scrapbook() {
		$galleries = $this->PhotoGallery->find('all', array('order' => array('ordering_position')));
		$photo_totals = $this->PhotoGallery->find('count');
		$this->set(compact('galleries','photo_totals'));		
	}

	public function bill_walton_speaks() {}
	
	public function favorite_maxims() {}
	
	public function mcdonalds_all_american_game () {}
	
	public function wooden_award () {}
	
}