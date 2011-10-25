<?php
class Talao extends AppModel {
	
	var $name = 'Talao';
	var $validate = array(
		'inicial' => array(
			'notempty',
			'numeric'
		),
		'final' => array(
			'notempty',
			'numeric'
		),
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
