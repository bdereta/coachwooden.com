<?php

App::uses('AppController', 'Controller');

class CaptchaController extends AppController {
	
	public $components = array('Captcha.Captcha');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();	
	}
	
	public function get_image() {
		$this->layout = 'ajax';
		$this->Captcha->CreateImage();
		$this->render(false);
	}
	
}
