<?php
class Estadocivil extends AppModel {
	var $name = 'Estadocivil';
	var $displayField = "nome";
	var $validate = array(
		'nome' => array('notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Estadocivil']['nome'])) {
			$this->data['Estadocivil']['nome'] = trim(strtoupper(strtr($this->data['Estadocivil']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
}
?>