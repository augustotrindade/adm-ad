<?php
class Matriculado extends AppModel {

	var $name = 'Matriculado';
	var $validate = array(
		'pessoa_id' => 'notempty'
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