<?php 
/* SVN FILE: $Id$ */
/* Usuario Fixture generated on: 2010-03-23 18:56:57 : 1269381417*/

class UsuarioFixture extends CakeTestFixture {
	var $name = 'Usuario';
	var $table = 'usuarios';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type'=>'string', 'null' => false, 'length' => 50),
		'login' => array('type'=>'string', 'null' => false, 'length' => 20),
		'senha' => array('type'=>'string', 'null' => false, 'length' => 32),
		'nivel' => array('type'=>'boolean', 'null' => false, 'default' => '2'),
		'data_log' => array('type'=>'integer', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'nome' => 'Lorem ipsum dolor sit amet',
		'login' => 'Lorem ipsum dolor ',
		'senha' => 'Lorem ipsum dolor sit amet',
		'nivel' => 1,
		'data_log' => 1
	));
}
?>