<?php
class Matriculado extends AppModel {

	var $name = 'Matriculado';
	var $validate = array(
		'turma_id' => array('notempty'),
		'pessoa_id' => array('notempty')
	);
	var $belongsTo = array(
		'Turma',
		'Pessoa'
	);
	
	function beforeSave() {
		return true;
	}
}
?>