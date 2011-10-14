<?php
class Status extends AppModel {
	
	var $name = 'Status';
	var $useTable = 'status';
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
