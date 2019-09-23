<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Categorias $Categorias
 * @property Users $Users
 */
class Post extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'categorias_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'Entre com o titulo' => array(
				'rule' => 'notEmpty',
				'message' => 'Por favor coloque o titulo'
			)
		),
		'body' => array(
			'Entre com o corpo do texto' => array(
				'rule' => 'notEmpty',
				'message' => 'Por favor coloque o texto'
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Categorias' => array(
			'className' => 'Categorias',
			'foreignKey' => 'categorias_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
