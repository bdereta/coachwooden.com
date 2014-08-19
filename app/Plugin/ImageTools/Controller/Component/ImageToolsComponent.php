<?php
App::uses('Component', 'Controller');

class ImageToolsComponent extends Component {
	
	public $components = array('Session');

	//enable controller methods inside component
	public function startup(Controller $controller) {
		$this->Controller = $controller;
	}
	
	public function process($params) {
		//initiliaze Bambla Plugin ImageTools Model 
		$this->ImageTools = ClassRegistry::init('ImageTools.ImageTools');
		//capture url
		$params['redirect']['controller'] = $this->Controller->request->params['controller'];
		
		$prefix = 'admin_';
		$action = $this->Controller->request->params['action'];
		$params['redirect']['action'] = preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $action);
		$params['redirect']['pass'] = $this->Controller->request->params['pass'];
		$params['redirect']['admin'] = $this->Controller->request->params['admin'];
		
		//upload images
		$params['uploadedData'] = $this->ImageTools->upload($params);
						
		//copy, resize, prepare crop
		$data = $this->ImageTools->processImages($params);
		
		//create session to preserve data
		$this->Session->delete('ImageTools.postData');
		$this->Session->write('ImageTools.postData', $data);
		
		if (array_key_exists('crop', $data)) {
			//go to cropper
			return $this->Controller->redirect(array(
				'controller' => 'ImageTools',
				'action' => 'crop',
				'admin' => false,
				'plugin' => 'ImageTools'
				)
			);
		} else {
			return $data;				
		}
	}	
}
	