<?php 
/* SVN FILE: $Id$ */
/* Cidade Fixture generated on: 2010-03-23 18:53:46 : 1269381226*/

class CidadeFixture extends CakeTestFixture {
	var $name = 'Cidade';
	var $table = 'cidades';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'uf' => array('type'=>'string', 'null' => false, 'length' => 2),
		'nome_cidade' => array('type'=>'string', 'null' => false, 'length' => 50),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'uf' => '',
		'nome_cidade' => 'Lorem ipsum dolor sit amet'
	));
}
?>