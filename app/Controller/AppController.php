<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $uses 		= array('Bambla.Bambla','Bambla.Metadata','Bambla.Section');
	public $helpers		= array('Bambla.Bambla','Cache','Html','Form');
	public $components 	= array('Session','Acl','DebugKit.Toolbar', 'Auth' => array('authorize' => array('Actions' => array('actionPath' => 'controllers'))));

	public function beforeFilter() {
		
		//fetch page title, keywords, and description for layout
		$metadata = unserialize($this->Metadata->FetchMetaData());
		
		if (!empty($metadata)) {
			$meta = array_key_exists($this->request->params['action'], $metadata) 
				? $metadata[$this->request->params['action']] 
				: $metadata['default'];
		}
		
		//capture all sections 
		$sections = $this->Section->fetchSections();
		$section = ($sections) ? unserialize($this->Section->fetchSections()) : NULL;
		
			
		//Configure AuthComponent
		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'loginRedirect' => array('controller' => 'pages', 'action' => 'home', 'plugin' => false),
            	'logoutRedirect' => array('controller' => 'pages', 'action' => 'home', 'plugin' => false),
				'userModel' => 'Bambla.User',
				'scope' => array(
					'User.active' => 1
				)
			),
			'Form' => array(
				'fields' => array('username' => 'email', 'password' => 'password'),
			),
		);
		
		$logged_in = $this->Auth->loggedIn();
		$current_user = $this->Auth->user();
		$is_admin = ($logged_in && $current_user['group_id'] < 3) ? true : false;
		$admin_links = array();	
		
		if ($is_admin) {
			//admin navigation
			$controllers = App::objects('controller');
			$additional_controllers = array('MetaData', 'Users');
			$controllers = array_merge($controllers, $additional_controllers);
			foreach($controllers as $controller) {
				$disabled_links = array('App','Pages');
				$controller = str_replace('Controller', '', $controller);
				$controller = Inflector::humanize(Inflector::underscore($controller));
				if (!in_array($controller, $disabled_links)) {
					$admin_links[] = $controller;
				}
			}
		}
				
		$this->set(compact('meta','section','admin_links','logged_in','is_admin'));
		
		$this->Auth->deny();
	}
}
