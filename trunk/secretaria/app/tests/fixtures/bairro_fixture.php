<?php 
/* SVN FILE: $Id$ */
/* Bairro Fixture generated on: 2010-03-26 18:58:07 : 1269640687*/

class BairroFixture extends CakeTestFixture {
	var $name = 'Bairro';
	var $table = 'bairros';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cidade_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'nome' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'cidade_id' => 1,
		'nome' => 'Lorem ipsum dolor sit amet',
		'created' => '2010-03-26 18:58:07',
		'updated' => '2010-03-26 18:58:07'
	));
}
?>