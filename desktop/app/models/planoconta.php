<?php
class Planoconta extends AppModel {
	
	var $name = 'Planoconta';
	var $validate = array(
		'codigo' => array('rule'=>'notempty'),
		'nome' => array('rule'=>'notempty')
	);
	var $hasMany = array(
		'Lancamento'
	);
	var $belongsTo = array(
		'Pai' => array(
			'className' => 'Planoconta',
			'foreignKey' => 'pai_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function beforeSave() {
		return true;
	}
}
?>
