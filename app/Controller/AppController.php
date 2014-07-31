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
	public $uses 		= array('Bambla.Bambla','Page','Section');
	public $helpers		= array('Bambla.Bambla','Cache','Html','Form');
	public $components 	= array('Session','Acl','DebugKit.Toolbar',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        )
	);

	public function beforeFilter() {
		
		//fetch page title, keywords, and description for layout
		$metum = unserialize($this->Page->fetchPageMetum());
		
		if (!empty($metum)) {
			$meta = array_key_exists($this->request->params['action'], $metum) 
				? $metum[$this->request->params['action']] 
				: $metum['default'];
		}
		
		//capture all sections 
		$sections = $this->Section->fetchSections();
		$section = ($sections) ? unserialize($this->Section->fetchSections()) : NULL;
		
		//admin navigation
		$adminNavigation = $this->Bambla->adminNavigation;
		
		//Configure AuthComponent
		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'loginRedirect' => array('controller' => 'StaticPages', 'action' => 'home'),
            	'logoutRedirect' => array('controller' => 'StaticPages', 'action' => 'home'),
				'userModel' => 'User',
				'scope' => array(
					'User.active' => 1
				)
			),
			'Form' => array(
				'fields' => array('username' => 'email', 'password' => 'password'),
			),
		);
		
		$logged_in		= $this->Auth->loggedIn();
		$current_user 	= $this->Auth->user();
		$is_admin		= ($logged_in && $current_user['group_id'] < 3) ? true : false;
		
		$this->set(compact('meta','section','adminNavigation','logged_in','current_user','is_admin'));
		
		$this->Auth->deny();
	}
}
