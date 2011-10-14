<?php
class Talao extends AppModel {
	
	var $name = 'Talao';
	var $validate = array(
		'qtde_folhas' => array('rule'=>'notempty'),
		'congregacao_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Congregacao'
	);
	var $hasMany = array(
		'Folhatalao'
	);
	
	function beforeSave() {
		return true;
	}
}
?>
