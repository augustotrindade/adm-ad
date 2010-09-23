<?php 
/* SVN FILE: $Id$ */
/* Congregacao Fixture generated on: 2010-03-23 18:54:58 : 1269381298*/

class CongregacaoFixture extends CakeTestFixture {
	var $name = 'Congregacao';
	var $table = 'congregacoes';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'congregacao' => array('type'=>'string', 'null' => false),
		'end_congr' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'congregacao' => 'Lorem ipsum dolor sit amet',
		'end_congr' => 'Lorem ipsum dolor sit amet'
	));
}
?>