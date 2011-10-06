<?php
class Cidade extends AppModel {

	var $name = 'Cidade';
	var $displayField = "nome";
	var $validate = array(
		'uf' => array('notempty'),
		'nome' => array('notempty')
	);
	
	function beforeSave() {
		if (isset($this->data['Cidade']['nome'])) {
			$this->data['Cidade']['nome'] = trim(strtoupper(strtr($this->data['Cidade']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
			$this->data['Cidade']['uf'] = trim(strtoupper(strtr($this->data['Cidade']['uf'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
	
	function getEstados(){
		$uf['AC']='AC';
		return $uf;
	}

}
?>