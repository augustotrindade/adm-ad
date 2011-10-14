<?php
class Contato extends AppModel {
	
	var $name = 'Contato';
	var $validate = array(
		'contato' => array('rule'=>'notempty'),
		'tipocontato_id' => array('rule'=>'notempty'),
		'pessoa_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Tipocontato',
		'Pessoa'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
