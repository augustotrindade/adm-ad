<?php
class Pessoa extends AppModel {
	
	var $name = 'Pessoa';
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'status_id' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Filho',
		'Ocorrencia',
		'Contato',
		'Lancamento'=>array(
			'className'=>'Lancamento',
			'foreignKey'=>'dizimista_id'
		)
	);
	var $hasOne = array(
		'Usuario'
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
