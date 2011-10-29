<?php
class Menu extends AppModel {
	var $name = 'Menu';
	var $displayField = "nome";
	var $actsAs = array('Tree');
	var $validate = array(
		'nome'=>'notempty'
	);
	var $belongsTo = array(
		'Parent' => array(
			'className'=>'Menu',
			'foreignKey'=>'parent_id'
		)
	);
	
}
?>