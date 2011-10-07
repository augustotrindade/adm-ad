<?php
class Filho extends AppModel {

	var $name = 'Filho';
	var $displayField = "nome";
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'sexo' => array('rule'=>'notempty'),
		'pessoa_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Pessoa'
	);
	
}
?>