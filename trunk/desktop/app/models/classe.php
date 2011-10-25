<?php
class Classe extends AppModel {
	
	var $name = 'Classe';
	var $displayField = 'nome';
	var $validate = array(
		'nome' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Turma'=>array(
			'className'=>'Turma',
			'foreignKey'=>'classe_id'
		)
	);
	
	function beforeSave() {
		if (isset($this->data['Classe']['nome'])) {
			$this->data['Classe']['nome'] = trim(strtoupper(strtr($this->data['Classe']['nome'],'���������','���������')));
		}
		return true;
	}
}
?>
