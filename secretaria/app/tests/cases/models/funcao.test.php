<?php 
/* SVN FILE: $Id$ */
/* Funcao Test cases generated on: 2010-03-23 18:55:20 : 1269381320*/
App::import('Model', 'Funcao');

class FuncaoTestCase extends CakeTestCase {
	var $Funcao = null;
	var $fixtures = array('app.funcao', 'app.membro');

	function startTest() {
		$this->Funcao =& ClassRegistry::init('Funcao');
	}

	function testFuncaoInstance() {
		$this->assertTrue(is_a($this->Funcao, 'Funcao'));
	}

	function testFuncaoFind() {
		$this->Funcao->recursive = -1;
		$results = $this->Funcao->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Funcao' => array(
			'id' => 1,
			'funcao' => 'Lorem ipsum dolor sit amet',
			'abreviacao' => 'Lorem ip'
		));
		$this->assertEqual($results, $expected);
	}
}
?>