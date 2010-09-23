<?php 
/* SVN FILE: $Id$ */
/* Ocorrencia Fixture generated on: 2010-04-22 22:10:25 : 1271985025*/

class OcorrenciaFixture extends CakeTestFixture {
	var $name = 'Ocorrencia';
	var $table = 'ocorrencias';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'membro_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'data_ocorrencia' => array('type'=>'date', 'null' => false, 'default' => NULL),
		'descricao' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'updated' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'membro_id' => 1,
		'data_ocorrencia' => '2010-04-22',
		'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created' => '2010-04-22 22:10:25',
		'updated' => '2010-04-22 22:10:25'
	));
}
?>