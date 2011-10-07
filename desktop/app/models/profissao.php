<?php
class Profissao extends AppModel {

	var $name = 'Profissao';
	var $displayField = "nome";
	var $validate = array(
		'nome' => array('notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Profissao']['nome'])) {
			$this->data['Profissao']['nome'] = trim(strtoupper(strtr($this->data['Profissao']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
}
?>