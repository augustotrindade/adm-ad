<?php
class Motivo extends AppModel {
	
	var $name = 'Motivo';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Pessoa'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
