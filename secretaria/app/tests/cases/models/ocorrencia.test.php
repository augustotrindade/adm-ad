<?php 
/* SVN FILE: $Id$ */
/* Ocorrencia Test cases generated on: 2010-04-22 22:10:25 : 1271985025*/
App::import('Model', 'Ocorrencia');

class OcorrenciaTestCase extends CakeTestCase {
	var $Ocorrencia = null;
	var $fixtures = array('app.ocorrencia', 'app.membro');

	function startTest() {
		$this->Ocorrencia =& ClassRegistry::init('Ocorrencia');
	}

	function testOcorrenciaInstance() {
		$this->assertTrue(is_a($this->Ocorrencia, 'Ocorrencia'));
	}

	function testOcorrenciaFind() {
		$this->Ocorrencia->recursive = -1;
		$results = $this->Ocorrencia->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Ocorrencia' => array(
			'id' => 1,
			'membro_id' => 1,
			'data_ocorrencia' => '2010-04-22',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2010-04-22 22:10:25',
			'updated' => '2010-04-22 22:10:25'
		));
		$this->assertEqual($results, $expected);
	}
}
?>