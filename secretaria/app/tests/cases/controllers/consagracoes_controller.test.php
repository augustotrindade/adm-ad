<?php 
/* SVN FILE: $Id$ */
/* ConsagracoesController Test cases generated on: 2010-04-05 23:23:46 : 1270520626*/
App::import('Controller', 'Consagracoes');

class TestConsagracoes extends ConsagracoesController {
	var $autoRender = false;
}

class ConsagracoesControllerTest extends CakeTestCase {
	var $Consagracoes = null;

	function startTest() {
		$this->Consagracoes = new TestConsagracoes();
		$this->Consagracoes->constructClasses();
	}

	function testConsagracoesControllerInstance() {
		$this->assertTrue(is_a($this->Consagracoes, 'ConsagracoesController'));
	}

	function endTest() {
		unset($this->Consagracoes);
	}
}
?>