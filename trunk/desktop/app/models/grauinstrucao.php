<?php
class Grauinstrucao extends AppModel {

	var $name = 'Grauinstrucao';
	var $displayField = "nome";
	var $validate = array(
		'nome' => array('notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Grauinstrucao']['nome'])) {
			$this->data['Grauinstrucao']['nome'] = trim(strtoupper(strtr($this->data['Grauinstrucao']['nome'],'ηγαβυσικν','ΗΓΑΒΤΣΙΚΝ')));
		}
		return true;
	}
}
?>