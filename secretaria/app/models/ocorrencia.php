<?php
class Ocorrencia extends AppModel {

	var $name = 'Ocorrencia';
	var $validate = array(
		'membro_id' => array('numeric'),
		'data_ocorrencia' => array('date'),
		'pequena_descricao' => array('notempty'),
		'descricao' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Membro' => array(
			'className' => 'Membro',
			'foreignKey' => 'membro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>