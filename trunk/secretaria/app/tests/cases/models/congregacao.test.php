<?php 
/* SVN FILE: $Id$ */
/* Congregacao Test cases generated on: 2010-03-23 18:54:58 : 1269381298*/
App::import('Model', 'Congregacao');

class CongregacaoTestCase extends CakeTestCase {
	var $Congregacao = null;
	var $fixtures = array('app.congregacao', 'app.membro');

	function startTest() {
		$this->Congregacao =& ClassRegistry::init('Congregacao');
	}

	function testCongregacaoInstance() {
		$this->assertTrue(is_a($this->Congregacao, 'Congregacao'));
	}

	function testCongregacaoFind() {
		$this->Congregacao->recursive = -1;
		$results = $this->Congregacao->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Congregacao' => array(
			'id' => 1,
			'congregacao' => 'Lorem ipsum dolor sit amet',
			'end_congr' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>