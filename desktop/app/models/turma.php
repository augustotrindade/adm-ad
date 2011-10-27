<?php
class Turma extends AppModel {
	
	var $name = 'Turma';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty'),
		'classe_id' => array('rule'=>'notempty'),
		'congregacao_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Classe',
		'Congregacao'
	);
	var $hasMany = array(
		'Matriculado'
	);
	
	function beforeSave() {
		if (isset($this->data['Turma']['nome'])) {
			$this->data['Turma']['nome'] = trim(strtoupper(strtr($this->data['Turma']['nome'],'���������','���������')));
		}
		return true;
	}
}
?>
