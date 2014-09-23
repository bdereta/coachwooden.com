<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {
	
	public $components = array('Security');
	public $uses = array('PhotoGallery','Book','Youtube.Youtube','AwardFact','News','Pyramid','QuoteCategory','Quote','WinnerCategory','Winner','Timeline');
	public $helpers = array('Youtube.Youtube');
	
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
		$quotes = $this->Quote->find('all', array('conditions' => array('quote_category_id' => 1)));
		$news = $this->News->find('all', array('order' => array('date')));
		//$youtube = $this->Youtube->get_content(array('playlist_id' => 'PLgFCaetxoiCjVst8anjAechJkVMokbCxW'));
		$this->set(compact('books','quotes','news'));		
	}

	public function the_journey () {
		$quotes = $this->Quote->find('all', array('conditions' => array('quote_category_id' => 3)));
		$timelines = $this->Timeline->find('all', array('order' => array('ordering_position')));
		$this->set(compact('quotes','timelines'));		
	}

	public function memory_wall() {
		
	}

	public function bookstore () {
		$books = $this->Book->find('all', array('order' => array('ordering_position')));
		$this->set(compact('books'));		
	}

	public function scrapbook() {
		$galleries = $this->PhotoGallery->find('all', array('order' => array('ordering_position')));
		$photo_totals = $this->PhotoGallery->find('count');
		$this->set(compact('galleries','photo_totals'));		
	}

	public function bill_walton_speaks() {}
	
	public function favorite_maxims() {
		$youtube = $this->Youtube->get_content(array('playlist_id' => 'PLgFCaetxoiCjVst8anjAechJkVMokbCxW'));
		$this->set('youtube',$youtube);
	}
	
	public function mcdonalds_all_american_game () {}
	
	public function wooden_award () {
		$quotes = $this->Quote->find('all', array('conditions' => array('quote_category_id' => 2)));
		$this->set('quotes',$quotes);		
	}
	
	public function pyramid_of_success () {}

}