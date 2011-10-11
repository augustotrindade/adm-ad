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
		$uf = array(
			'AC'=>'ACRE',
			'AL'=>'ALAGOAS',
			'AP'=>'AMAPA',
			'AM'=>'AMAZONAS',
			'BA'=>'BAHIA',
			'CE'=>'CEARA',
			'DF'=>'DISTRITO FEDERAL',
			'ES'=>'ESPIRITO SANTO',
			'GO'=>'GOIAS',
			'MA'=>'MARANHAO',
			'MT'=>'MATO GROSSO',
			'MS'=>'MATO GROSSO DO SUL',
			'MG'=>'MINAS GERAIS',
			'PA'=>'PARA',
			'PB'=>'PARAIBA',
			'PR'=>'PARANA',
			'PE'=>'PERNAMBUCO',
			'PI'=>'PIAUI',
			'RJ'=>'RIO DE JANEIRO',
			'RN'=>'RIO GRANDE DO NORTE',
			'RS'=>'RIO GRANDE DO SUL',
			'RO'=>'RONDONIA',
			'RR'=>'RORAIMA',
			'SC'=>'SANTA CATARINA',
			'SP'=>'SAO PAULO',
			'SE'=>'SERGIPE',
			'TO'=>'TOCANTINS'
		);
		return $uf;
	}

}
?>