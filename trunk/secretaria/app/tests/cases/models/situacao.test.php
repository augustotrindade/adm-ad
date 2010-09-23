<?php 
/* SVN FILE: $Id$ */
/* Situacao Test cases generated on: 2010-03-31 22:38:47 : 1270085927*/
App::import('Model', 'Situacao');

class SituacaoTestCase extends CakeTestCase {
	var $Situacao = null;
	var $fixtures = array('app.situacao');

	function startTest() {
		$this->Situacao =& ClassRegistry::init('Situacao');
	}

	function testSituacaoInstance() {
		$this->assertTrue(is_a($this->Situacao, 'Situacao'));
	}

	function testSituacaoFind() {
		$this->Situacao->recursive = -1;
		$results = $this->Situacao->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Situacao' => array(
			'id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'ativo' => 1,
			'created' => '2010-03-31 22:38:47',
			'updated' => '2010-03-31 22:38:47'
		));
		$this->assertEqual($results, $expected);
	}
}
?>