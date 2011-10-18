<?php
class Tipopessoa extends AppModel {
	
	var $name = 'Tipopessoa';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'ordem' => array('rule'=>'notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Tipopessoa']['nome'])) {
			$this->data['Tipopessoa']['nome'] = trim(strtoupper(strtr($this->data['Tipopessoa']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
}
?>
