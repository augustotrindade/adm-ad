<?php
class Consagracao extends AppModel {

	var $name = 'Consagracao';
	var $validate = array(
		'membro_id' => array('numeric'),
		'funcao_id' => array('numeric'),
		'data_consagracao' => array('date'),
		'uf' => array('notempty'),
		'cidade_id' => array('numeric'),
		'nome_igreja' => array('notempty'),
		'nome_pastor' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Membro' => array(
			'className' => 'Membro',
			'foreignKey' => 'membro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Funcao' => array(
			'className' => 'Funcao',
			'foreignKey' => 'funcao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>