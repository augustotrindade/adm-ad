<?php
class Status extends AppModel {
	
	var $name = 'Status';
	var $useTable = 'status';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Pessoa'=>array(
			'className'=>'Pessoa',
			'foreignKey' => 'status_id',
		)
	);
	
	function beforeSave() {
		return true;
	}
}
?>
