<?php
class Funcao extends AppModel {

	var $name = 'Funcao';
	var $displayField = "nome";
	var $validate = array(
		'nome' => array('notempty'),
		'abreviacao' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Membro' => array(
			'className' => 'Membro',
			'foreignKey' => 'funcao_id',
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
?>