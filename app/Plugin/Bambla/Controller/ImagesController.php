<?php

App::uses('AppController', 'Controller');

class ImagesController extends BamblaAppController {

	public $components = array('Session');
	
	public function beforeFilter() {
		parent::beforeFilter();	
		$this->layout = 'Bambla.bambla';
	}
		
	public function crop() {
		$this->layout = 'Bambla.crop';
		if ($this->Session->check('Bambla.postData')){		
			$data = $this->Session->read('Bambla.postData');
			$count = 0;
			//process cropped image
			if ($this->request->is('post')) {
				$label = $this->request->data['Image']['label'];
				$count = $this->request->data['Image']['count'];
				$result = $this->Image->cropImage($this->request->data);
				$data['crop'][$label]['cropped'] = 1;
				$count++;
				$this->Session->delete('Bambla.postData');
				$this->Session->write('Bambla.postData', $data);
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
