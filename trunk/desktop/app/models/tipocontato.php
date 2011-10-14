<?php
class Tipocontato extends AppModel {
	
	var $name = 'Tipocontato';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	
	function beforeSave() {
		return true;
	}
}
?>
