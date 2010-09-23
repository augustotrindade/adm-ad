<?php
class Congregacao extends AppModel {

	var $name = 'Congregacao';
	var $displayField = "nome";
	var $validate = array(
		'nome' => array('notempty'),
		'endereco' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Membro' => array(
			'className' => 'Membro',
			'foreignKey' => 'congregacao_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function beforeSave() {
		if (isset($this->data['Congregacao']['nome'])) {
			$this->data['Congregacao']['nome'] = trim(strtoupper(strtr($this->data['Congregacao']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}

}
?>