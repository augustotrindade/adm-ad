<?php
class Pessoa extends AppModel {
	
	var $name = 'Pessoa';
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'status_id' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Filho',
		'Ocorrencia',
		'Contato',
		'Lancamento'=>array(
			'className'=>'Lancamento',
			'foreignKey'=>'dizimista_id'
		)
	);
	var $hasOne = array(
		'Usuario'
	);
	var $belongsTo = array(
		'Status',
		'Cidadeendereco'=>array(
			'className'=>'Cidade',
			'foreignKey'=>'cidadeendereco_id'
		)
	);
	var $hasAndBelongsToMany = array(
		'Tipopessoa'
	);
	
	function beforeSave() {
		if (isset($this->data['Pessoa']['nome'])) {
			$this->data['Pessoa']['nome'] = trim(strtoupper(strtr($this->data['Pessoa']['nome'],'çãáâõóéêí','ÇÃÁÂÔÓÉÊÍ')));
		}
		return true;
	}
	
	function afterFind($resultado){
		if(count($resultado)>0){
			foreach ($resultado as $k => $v) {
				if(isset($v['Cidadeendereco'])){
					$resultado[$k]['Pessoa']['estadoendereco_id'] = $v['Cidadeendereco']['uf'];
				}
			}
		}
		return $resultado;
	}
}
?>
