<?php
class Cartao extends AppModel {
	
	var $name = 'Cartao';
	var $recursive = 2;
	var $validate = array(
		'sequencial' => array('rule'=>'notempty'),
		'modelocartao_id' => array('rule'=>'notempty'),
		'pessoa_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Modelocartao',
		'Pessoa'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
