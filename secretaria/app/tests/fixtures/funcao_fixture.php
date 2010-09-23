<?php 
/* SVN FILE: $Id$ */
/* Funcao Fixture generated on: 2010-03-23 18:55:20 : 1269381320*/

class FuncaoFixture extends CakeTestFixture {
	var $name = 'Funcao';
	var $table = 'funcoes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'funcao' => array('type'=>'string', 'null' => false, 'length' => 60),
		'abreviacao' => array('type'=>'string', 'null' => false, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'funcao' => 'Lorem ipsum dolor sit amet',
		'abreviacao' => 'Lorem ip'
	));
}
?>