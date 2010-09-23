<?php
class Membro extends AppModel {

	var $name = 'Membro';
	var $validate = array(
		'congregacao_id' => array('rule'=>array('numeric'),'message'=>'Este campo não pode estar em branco'),
		'funcao_id' => array('rule'=>array('numeric'),'message'=>'Este campo não pode estar em branco'),
		'nome' => array('rule'=>array('notempty'),'message'=>'Este campo não pode estar em branco'),
		'sexo' => array('rule'=>array('notempty'),'message'=>'Este campo não pode estar em branco'),
		'data_nascimento' => array('rule'=>array('notempty'),'message'=>'Este campo não pode estar em branco'),
		'nome_mae' => array('rule'=>array('notempty'),'message'=>'Este campo não pode estar em branco'),
		'uf_nascimento' => array('rule'=>array('notempty'),'message'=>'Este campo não pode estar em branco'),
		'data_batismo_aguas' => array('rule'=>array('notempty'),'message'=>'Este campo não pode estar em branco')
	);
	
	//var $estado_civil = array('S'=>'Solteiro','C'=>'Casado','D'=>'Divorciado','V'=>'Viúvo');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Congregacao' => array(
			'className' => 'Congregacao',
			'foreignKey' => 'congregacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Funcao' => array(
			'className' => 'Funcao',
			'foreignKey' => 'funcao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cidadenascimento' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidadenascimento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'Consagracao' => array(
			'className' => 'Consagracao',
			'foreignKey' => 'membro_id',
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
		if (isset($this->data['Membro']['nome'])) {
			if (isset($this->data['Membro']['nome'])) {
				$this->data['Membro']['nome'] = trim(strtoupper(strtr($this->data['Membro']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
			}
			if (isset($this->data['Membro']['nome_pai'])) {
				$this->data['Membro']['nome_pai'] = trim(strtoupper(strtr($this->data['Membro']['nome_pai'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
			}
			if (isset($this->data['Membro']['nome_mae'])) {
				$this->data['Membro']['nome_mae'] = trim(strtoupper(strtr($this->data['Membro']['nome_mae'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
			}
			if (isset($this->data['Membro']['nome_conjuge'])) {
				$this->data['Membro']['nome_conjuge'] = trim(strtoupper(strtr($this->data['Membro']['nome_conjuge'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
			}
		}
		return true;
	}
	
	function beforeDelete(){
		return false;
	}

}
?>