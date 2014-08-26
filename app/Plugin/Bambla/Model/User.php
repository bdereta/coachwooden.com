<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $validate = array(
		'first_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'First Name is required.',
		),
		
		'last_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'message' => 'Last Name is required.',
		),
	
		'email' => array(
			'email' => array(
				'rule' => 'email',	
				'required' => true,
				'message' => 'Email is required.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Email address is already in use.'
			)

		),
		'password' => array(
			'onCreate' => array(
				'on'   => 'create',
				'rule'    => array('minLength', '8'),
				'message' => 'Minimum 8 characters long',
				'required' => true
			),
			'onUpdate' => array(
				'on'   => 'update',
				'rule'    => array('minLength', '8'),
				'message' => 'Minimum 8 characters long',
				'allowEmpty' => true
			),
		),
			
		'confirm_password' => array(
			'onCreate' => array(
				'on'   => 'create',
				'rule' => array('equaltofield','password'),
				'message' => 'Passwords are not matching.',
				'required' => true
			),
			'onUpdate' => array(
				'on'   => 'update',
				'rule' => array('equaltofield','password'),
				'message' => 'Passwords are not matching.',
				//'allowEmpty' => true
			),
            
        ),
	);
	
	public function equaltofield($check,$otherfield) {
		//get name of field
		$fname = '';
		foreach ($check as $key => $value){
			$fname = $key;
			break;
		}
		return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
	} 
	
	//ACL Sync
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}
	
	public function bindNode() {
   		$data = AuthComponent::user();
    	return array('model' => 'Group', 'foreign_key' => $data['group_id']);
    }


	//hash password
	public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }	

}
