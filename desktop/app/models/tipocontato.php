<?php
class Tipocontato extends AppModel {
	
	var $name = 'Tipocontato';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Tipocontato']['nome'])) {
			$this->data['Tipocontato']['nome'] = trim(strtoupper(strtr($this->data['Tipocontato']['nome'],'���������','���������')));
		}
		return true;
	}
}
?>
