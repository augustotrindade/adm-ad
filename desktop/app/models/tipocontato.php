<?php
class Tipocontato extends AppModel {
	
	var $name = 'Tipocontato';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	
	function beforeSave() {
		return true;
	}
}
?>
