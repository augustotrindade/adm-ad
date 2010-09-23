<?php 
/* SVN FILE: $Id$ */
/* Situacao Fixture generated on: 2010-03-31 22:38:47 : 1270085927*/

class SituacaoFixture extends CakeTestFixture {
	var $name = 'Situacao';
	var $table = 'situacoes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'ativo' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'nome' => 'Lorem ipsum dolor sit amet',
		'ativo' => 1,
		'created' => '2010-03-31 22:38:47',
		'updated' => '2010-03-31 22:38:47'
	));
}
?>