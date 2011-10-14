<?php
class Folhatalao extends AppModel {
	
	var $name = 'Folhatalao';
	var $validate = array(
		'talao_id' => array('rule'=>'notempty'),
		'data' => array('rule'=>'notempty'),
		'numero' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Talao'
	);
	var $hasMany = array(
		'Lancamento'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
