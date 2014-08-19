<?php
App::uses('Component', 'Controller');

class ImageProcessorComponent extends Component {
	
	public $components = array('Session');
	
	//enable controller methods inside component
	public function startup(Controller $controller) {
		$this->Controller = $controller;
	}
	
	public function process($params) {
		
		//initiliaze Bambla Plugin Image Model 
		$this->Image = ClassRegistry::init('Bambla.Image');
		
		//capture url
		$params['redirect']['controller'] = $this->Controller->request->params['controller'];
		$prefix = 'admin_';
		$action = $this->Controller->request->params['action'];
		$params['redirect']['action'] = preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $action);
		$params['redirect']['pass'] = $this->Controller->request->params['pass'];
		$params['redirect']['admin'] = $this->Controller->request->params['admin'];
							
		//upload images
		$params['uploadedData'] = $this->Image->upload($params);
						
		//copy, resize, prepare crop
		$data = $this->Image->processImages($params);
		
		//create session to preserve data
		$this->Session->delete('Bambla.postData');
		$this->Session->write('Bambla.postData', $data);
		
		if (array_key_exists('crop', $data)) {					
			//go to cropper
			return $this->Controller->redirect(array(
				'controller' => 'images', 
				'action' => 'crop', 
				'admin' => false,
				'plugin' => 'bambla'
				)
			);
		} else {
			return $data;				
		}
	}	
}
	