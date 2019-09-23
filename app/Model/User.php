<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $validate = array(
		'groups_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'Entre com seu nome' => array(
				'rule' => 'notEmpty',
				'message' => 'Por favor coloque seu nome'
			)
		),
		'email' => array(
			'Entre com seu email' => array(	
				'rule' => 'notEmpty',
				'message' => 'Por favor coloque seu email'
			)
		),
		'username' => array(
			'Entre com seu usuario' => array(
				'rule' => 'notEmpty',
				'message' => 'Por favor coloque seu usuario'
			)
		),	
		'password' => array(
			'Entre com sua senha' => array(
					'rule' => 'notEmpty',
					'message' => 'Por favor coloque sua senha'
			),
			'8 digitos' => array(
				'rule' => array('minLength', '8'),
				'message' => 'Mínimo de 8 caracteres'
			)	
		),	
		'status' => array(
			'Coloque o status' => array(
					'rule' => 'notEmpty',
					'message' => 'Por favor Coloque o status'
			)
		),	
	);


	public $belongsTo = array(
		'Groups' => array(
			'className' => 'Groups',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave($options = array()){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']); //TRANSFORMAR STRING EM HASH
		}
		return true;
	}
}
