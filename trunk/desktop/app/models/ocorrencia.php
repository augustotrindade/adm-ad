<?php
class Ocorrencia extends AppModel {
	
	var $name = 'Ocorrencia';
	var $validate = array(
		'data' => array('rule'=>'notempty'),
		'ocorrencia' => array('rule'=>'notempty'),
		'pessoa_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Pessoa'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
