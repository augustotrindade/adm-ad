<?php 
/* SVN FILE: $Id$ */
/* Consagracao Test cases generated on: 2010-04-05 23:23:32 : 1270520612*/
App::import('Model', 'Consagracao');

class ConsagracaoTestCase extends CakeTestCase {
	var $Consagracao = null;
	var $fixtures = array('app.consagracao', 'app.membro', 'app.funcao', 'app.cidade');

	function startTest() {
		$this->Consagracao =& ClassRegistry::init('Consagracao');
	}

	function testConsagracaoInstance() {
		$this->assertTrue(is_a($this->Consagracao, 'Consagracao'));
	}

	function testConsagracaoFind() {
		$this->Consagracao->recursive = -1;
		$results = $this->Consagracao->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Consagracao' => array(
			'id' => 1,
			'membro_id' => 1,
			'funcao_id' => 1,
			'data_consagracao' => '2010-04-05',
			'cidade_id' => 1,
			'nome_igreja' => 'Lorem ipsum dolor sit amet',
			'nome_pastor' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>