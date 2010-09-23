<?php 
/* SVN FILE: $Id$ */
/* Consagracao Fixture generated on: 2010-04-05 23:23:32 : 1270520612*/

class ConsagracaoFixture extends CakeTestFixture {
	var $name = 'Consagracao';
	var $table = 'consagracoes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'membro_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'funcao_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'data_consagracao' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'cidade_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'nome_igreja' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'nome_pastor' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'membro_id' => 1,
		'funcao_id' => 1,
		'data_consagracao' => '2010-04-05',
		'cidade_id' => 1,
		'nome_igreja' => 'Lorem ipsum dolor sit amet',
		'nome_pastor' => 'Lorem ipsum dolor sit amet'
	));
}
?>