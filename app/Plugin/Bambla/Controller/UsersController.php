<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator','Session','Captcha.Captcha', 'Security');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'Bambla.bambla';
		$allowed_actions = array('login','logout');
		if (!IS_PROD) {
			array_push($allowed_actions, 'admin_index','admin_add','admin_edit');
		}
		$this->Auth->allow($allowed_actions);		
		$this->Security->blackHoleCallback = 'blackhole';
	}
	
	public function blackhole($type) {
		return $this->redirect($this->referer());
	}	

	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'Bambla.red');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'Bambla.green');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'Bambla.red');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			unset($this->request->data['User']['password']);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'), 'Bambla.green');
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'Bambla.red');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function admin_login() {
		
		$this->layout = "Bambla.login";
		
		if ($this->Auth->loggedIn()) {
			return $this->redirect($this->Auth->redirectUrl());
		} else {
			if ($this->request->is('post')) {
				
				//captcha
				$captcha_session = $this->Session->read('captcha');
				$captcha_input = $this->request->data['User']['captcha'];
				if (empty($captcha_session) || empty($captcha_input) || $captcha_session != $captcha_input) {
					$this->Session->delete('captcha');
					unset($this->request->data['User']['captcha']);
					return $this->Session->setFlash(__('Please enter correct Security Code'), 'Bambla.red');
				}
				
				$user = $this->User->findByEmail($this->data['User']['email']);
				if (!empty($user)) {
					if (empty($user['User']['active']) || $user['User']['active'] == 0) {
						$this->Session->setFlash('Your account has been deactivated. Please contact your site administrator.', 'Bambla.red');
					} else {
						if ($this->Auth->login()) {
							$this->Session->setFlash('You have successfully logged in!', 'Bambla.green');
							return $this->redirect($this->Auth->redirect());
						} else {
							return $this->Session->setFlash('The email or password you have entered is invalid.', 'Bambla.red');
						}	
					}
				} else {
					return $this->Session->setFlash('The email or password you have entered is invalid.', 'Bambla.red');
				}
			}
		}
	}
	
	public function admin_logout() {
		$this->Session->setFlash('You have successfully logged out!', 'Bambla.green');
		$this->redirect($this->Auth->logout());	
	}
	
	
	public function admin_setPermissions() {
		
		//before running this action make sure all your controller/action nodes are added to ACOS table:
		//CONSOLE#: cake AclExtras.AclExtras aco_sync
		//	OR if you wish to keep the nodes even if they no longer exist (removed controllers/actions):
		//CONSOLE#:	cake AclExtras.AclExtras aco_update
		
		$group = $this->User->Group;
		//Allow super admins to everything
		$group->id = 1;
		$this->Acl->allow($group, 'controllers');
		echo 'Done!<br>';
				
		//allow admins to posts and widgets
		$group->id = 2;
		$this->Acl->allow($group, 'controllers');
		echo 'Done!<br>';
	
		//allow users to only add and edit on posts and widgets
		$group->id = 3;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/pages');
		echo 'Done!<br>';
		die();
		
	}
	
}
	
	
	
	
	
