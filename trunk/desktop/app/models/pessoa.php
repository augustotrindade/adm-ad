<?php
class Pessoa extends AppModel {
	
	var $name = 'Pessoa';
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'status_id' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Filho',
		'Ocorrencia'
	);
	var $belongsTo = array(
		'Status'
	);
	var $hasAndBelongsToMany = array(
		'Tipopessoa'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
