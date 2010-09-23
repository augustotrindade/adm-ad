<?php
class Situacao extends AppModel {

	var $name = 'Situacao';
	var $validate = array(
		'nome' => array('notempty'),
		'ativo' => array('numeric')
	);

}
?>