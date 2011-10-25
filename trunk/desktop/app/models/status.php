<?php
class Status extends AppModel {
	
	var $name = 'Status';
	var $useTable = 'status';
	var $displayField = 'nome';
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
		if (isset($this->data['Status']['nome'])) {
			$this->data['Status']['nome'] = trim(strtoupper(strtr($this->data['Status']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
}
?>
