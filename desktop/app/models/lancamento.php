<?php
class Lancamento extends AppModel {
	
	var $name = 'Lancamento';
	var $validate = array(
		'planoconta_id' => array('rule'=>'notempty'),
		'folhatalao_id' => array('rule'=>'notempty'),
		'valor' => array('rule'=>'notempty'),
		'operacao' => array('rule'=>'notempty'),
		'data' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Planoconta',
		'Folhatalao',
		'Dizimista' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'dizimista_id',
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
