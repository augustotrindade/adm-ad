<?php
class Modelocartao extends AppModel {
	var $name = 'Modelocartao';
	var $displayField = "tipopessoa_nome";
	var $virtualFields = array(
		'tipopessoa_nome' => "(select nome from tipopessoas where id=Modelocartao.tipopessoa_id)"
	);
	var $validate = array(
		'tipopessoa_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Tipopessoa' => array(
			'className' => 'Tipopessoa',
			'foreignKey' => 'tipopessoa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Campo' => array(
			'className' => 'Campo',
			'foreignKey' => 'modelocartao_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
