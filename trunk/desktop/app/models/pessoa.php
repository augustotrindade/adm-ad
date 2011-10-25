<?php
class Pessoa extends AppModel {
	
	var $name = 'Pessoa';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'sexo' => array('rule'=>'notempty'),
		'status_id' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Filho',
		'Ocorrencia',
		'Contato',
		'Lancamento'=>array(
			'className'=>'Lancamento',
			'foreignKey'=>'dizimista_id',
			'limit' => '10',
			'order' => 'Lancamento.data DESC'
		)
	);
	var $hasOne = array(
		'Usuario'
	);
	var $belongsTo = array(
		'Status',
		'Congregacao',
		'Cidadeendereco'=>array(
			'className'=>'Cidade',
			'foreignKey'=>'cidadeendereco_id'
		),
		'Cidadenaturalidade'=>array(
			'className'=>'Cidade',
			'foreignKey'=>'cidadenaturalidade_id'
		),
		'Motivoentrada'=>array(
			'className'=>'Motivo',
			'foreignKey'=>'motivoentrada_id'
		),
		'Motivosaida'=>array(
			'className'=>'Motivo',
			'foreignKey'=>'motivosaida_id'
		)
	);
	var $hasAndBelongsToMany = array(
		'Tipopessoa' => array(
			'className' => 'Tipopessoa',
			'foreignKey' => 'pessoa_id',
			'associationForeignKey' => 'tipopessoa_id',
			'unique'=>true
		)
	);
	
	function beforeSave() {
		if (isset($this->data['Pessoa']['nome'])) {
			$this->data['Pessoa']['nome'] = trim(strtoupper(strtr($this->data['Pessoa']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		if (isset($this->data['Pessoa']['nome_pai'])) {
			$this->data['Pessoa']['nome_pai'] = trim(strtoupper(strtr($this->data['Pessoa']['nome_pai'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		if (isset($this->data['Pessoa']['nome_mae'])) {
			$this->data['Pessoa']['nome_mae'] = trim(strtoupper(strtr($this->data['Pessoa']['nome_mae'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		if (isset($this->data['Pessoa']['nome_conjuge'])) {
			$this->data['Pessoa']['nome_conjuge'] = trim(strtoupper(strtr($this->data['Pessoa']['nome_conjuge'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		if (isset($this->data['Pessoa']['apelido'])) {
			$this->data['Pessoa']['apelido'] = trim(strtoupper(strtr($this->data['Pessoa']['apelido'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
	
	function afterFind($resultado){
		if(count($resultado)>0){
			foreach ($resultado as $k => $v) {
				if(isset($v['Cidadeendereco'])){
					$resultado[$k]['Pessoa']['estadoendereco_id'] = $v['Cidadeendereco']['uf'];
				}
				if(isset($v['Cidadenaturalidade'])){
					$resultado[$k]['Pessoa']['estadonaturalidade_id'] = $v['Cidadenaturalidade']['uf'];
				}
			}
		}
		return $resultado;
	}
	
	function getSexos(){
		$sexos = array('M'=>'Masculino','F'=>'Feminino');
		return $sexos;
	}
}
?>
