<?php
class Menu extends AppModel {
	var $name = 'Menu';
	var $displayField = "nome";
	var $actsAs = array('GroupTree');
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