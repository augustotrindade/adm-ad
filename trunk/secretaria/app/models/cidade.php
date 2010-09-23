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
		$cidades = $this->find('all',array('fields'=>array('distinct'=>'Cidade.uf'),'order'=>array('Cidade.uf')));
		$uf = array();
		if (count($cidades)>0) {
			foreach ($cidades as $cidade){
				$uf[$cidade['Cidade']['uf']]=$cidade['Cidade']['uf'];
			}
		}
		return $uf;
	}

}
?>