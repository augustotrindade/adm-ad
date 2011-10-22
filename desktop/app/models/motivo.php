<?php
class Motivo extends AppModel {
	
	var $name = 'Motivo';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	
	function beforeSave() {
		return true;
	}
}
?>
