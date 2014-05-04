<?php
App::uses('AppController', 'Controller');

class StaticPagesController extends AppController {
	
	public $components = array('Security');
	public $uses = array('Instagram.Instagram', 'Facebook.Facebook', 'Twitter.Twitter', 'Youtube.Youtube');
	public $helpers = array('Instagram.Instagram', 'Facebook.Facebook', 'Twitter.Twitter', 'Youtube.Youtube');
	
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
	
	public function home() {}

	// SOCIAL MEDIA EXAMPLES
	
	/*
	public function instagram() {
		$instagram = $this->Instagram->get_content(array('user_id' => 47859376));
		$this->set('instagram',$instagram);
	}
	
	public function twitter() {
		$twitter = $this->Twitter->get_content(array('username' => 'StephenAtHome'));		
		$this->set('twitter',$twitter);
	}
	
	public function facebook() {
		$facebook = $this->Facebook->get_content(array('user_id' => '320576454965', 'debug_mode' => true));
		$this->set('facebook',$facebook);
	}
	
	public function youtube() {
		$youtube = $this->Youtube->get_content(array('playlist_id' => 'PLUgBH9QfAOkXeRgLEJkLJ-Qh1i88zWwi2', 'debug_mode' => true));
		$this->set('youtube',$youtube);
	}
	*/
}