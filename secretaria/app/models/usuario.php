<?php
class Usuario extends AppModel {

	var $name = 'Usuario';
	var $validate = array(
		'nome' => array('notempty'),
		'login' => array('notempty'),
		'senha' => array('notempty'),
		'data_log' => array('numeric')
	);

}
?>