<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {
	
	public $components = array('Security', 'Captcha.Captcha');
	public $uses = array('Homeslide','Scrapbook','Book','Youtube.Youtube','AwardPhoto','News','Pyramid','QuoteCategory','Quote','WinnerCategory','Winner','Timeline','ShareMemory');
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
		$news = $this->News->find('all', array('order' => array('date desc')));
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
			//captcha
			$captcha_session = $this->Session->read('captcha');
			$captcha_input = $this->request->data['RequestAppearance']['captcha'];
			if (empty($captcha_session) || empty($captcha_input) || $captcha_session != $captcha_input) {
				$this->Session->delete('captcha');
				return $this->Session->setFlash(__('Please enter correct Security Code'), 'popup');
			}

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
		$items_per_group = 10;
		$total_records = $this->ShareMemory->find('count');
		$total_groups = ceil($total_records/$items_per_group);
		$this->set(compact('total_groups'));		
	}
	
	public function memory_wall_ajax() {
		$this->layout = "ajax";
		$items_per_group = 10;
		
		if ($this->request->is('post')) {
			debug($this->request->data);
			//sanitize post value
			$group_number = !empty($this->request->data['group_number']) ? $this->request->data['group_number'] : 0;

			//get current starting point of records
			$position = ($group_number * $items_per_group);
			
						
			//Limit our results within a specified range. 
			$comments = $this->ShareMemory->find('all', array('order' => array('created desc'), 'limit' => array($position, $items_per_group)));
			$this->set('comments', $comments );		
		}

	}

	public function last_visit_with_coach () {}

	public function true_to_yourself () {}
	
	public function contact () {}

	public function bookstore () {
		$books = $this->Book->find('all', array('order' => array('ordering_position')));
		$this->set(compact('books'));		
	}

	public function scrapbook() {
		$galleries = $this->Scrapbook->find('all', array('order' => array('ordering_position')));
		$photo_totals = $this->Scrapbook->find('count');
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
		$photos = $this->AwardPhoto->find('all', array('order' => array('ordering_position')));
		$winners = $this->WinnerCategory->find('all', array('order' => array('ordering_position')));
		$this->set(compact('quotes','photos','winners'));		
	}
	
	public function pyramid_of_success () {
		$blocks = $this->Pyramid->find('all');
		$this->set('blocks',$blocks);		
	}

	public function privacy_policy () {}
	
	public function terms_of_use () {}
}