<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {
	
	public $components = array('Security');
	public $uses = array('PhotoGallery','Book','Youtube.Youtube','AwardFact','News','Pyramid','QuoteCategory','Quote','WinnerCategory','Winner','Timeline','ShareMemory');
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
		if ($this->request->is('post')) {
			if (!empty($this->request->data['ShareMemory'])) {
				
				//email
				$message = "Request Appearance Form\n\n";
				foreach($this->request->data['ShareMemory'] as $key => $val) {
					$form[] = Inflector::humanize($key).': '.$val;	
				} 
				$message.= implode("\n", $form);
	
				$Email = new CakeEmail();
				$Email->from(array('noreply@'.$_SERVER['HTTP_HOST'] => $_SERVER['HTTP_HOST']))
					->to('cora@cubismedia.com')
					->subject('Share Memory Form')
					->send($message);		
				
				//save to database
				$this->ShareMemory->create();
				if ($this->ShareMemory->save($this->request->data)) {
					$this->Session->setFlash(__('<h3>Thank You!</h3><p>Your request has been sent.</p>'),'popup');
				} else {
					$this->Session->setFlash(__('<p>Sorry, we were unable to submit your request. Please, try again.</p>'),'popup');
				}
			} else {
				$this->Session->setFlash(__('<p>Sorry, we were unable to submit your request. Please, try again.</p>'),'popup');
			}
		}
	}

	public function last_words () {}

	public function true_to_yourself () {}
	
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