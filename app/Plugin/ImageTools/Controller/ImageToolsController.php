<?php

App::uses('AppController', 'Controller');

class ImageToolsController extends AppController {
	
	public $components = array('Session');
	
	public function beforeFilter() {
		parent::beforeFilter();	
		$this->layout = 'Bambla.bambla';
	}
		
	public function crop() {
		$this->layout = 'ImageTools.crop';
		if ($this->Session->check('ImageTools.postData')){		
			$data = $this->Session->read('ImageTools.postData');
			$count = 0;
			//process cropped image
			if ($this->request->is('post')) {
				$label = $this->request->data['ImageTool']['label'];
				$count = $this->request->data['ImageTool']['count'];
				$result = $this->ImageTool->cropImage($this->request->data);
				$data['crop'][$label]['cropped'] = 1;
				$count++;
				$this->Session->delete('ImageTools.postData');
				$this->Session->write('ImageTools.postData', $data);
			}
			if (!empty($data['crop'])) {
				$total = count($data['crop']);
				$remaining = $total;
				foreach($data['crop'] as $label=>$image) {
					//display crop tool
					if (!array_key_exists('cropped', $image)) {
						$this->set(compact('label','image','count','total'));
						break;
					} else {
						$remaining--;
						//have all images been cropped?
						if ($remaining <= 0) {
							$pass = (!empty($data['redirect']['pass'][0])) ? $data['redirect']['pass'][0] : NULL;
							return $this->redirect(array(
								'controller' => $data['redirect']['controller'], 
								'action' => $data['redirect']['action'], $pass,
								'admin' => $data['redirect']['admin'],
								'plugin' => false
							));
						}
					}
				}
			}	
		} else {
			$this->autoRender = false;
			$this->Session->setFlash(__('Error: Image data is missing.'));
			$this->redirect('/');
		}
	}
	

}
