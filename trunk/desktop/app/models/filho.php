<?php
class Filho extends AppModel {

	var $name = 'Filho';
	var $displayField = "nome";
	var $validate = array(
		'nome' => 'notempty',
		'sexo' => 'notempty',
		'pessoa_id' => 'notempty'
	);
	var $belongsTo = array(
		'Pessoa'
	);
	
}
?>