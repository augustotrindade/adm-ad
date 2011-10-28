<?php
class Campo extends AppModel {
	var $name = 'Campo';
	var $displayField = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Modelocartao' => array(
			'className' => 'Modelocartao',
			'foreignKey' => 'modelocartao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
