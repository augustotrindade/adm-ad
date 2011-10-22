<?php
class Motivo extends AppModel {
	
	var $name = 'Motivo';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Motivo']['nome'])) {
			$this->data['Motivo']['nome'] = trim(strtoupper(strtr($this->data['Motivo']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
}
?>
