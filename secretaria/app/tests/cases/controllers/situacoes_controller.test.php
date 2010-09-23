<?php 
/* SVN FILE: $Id$ */
/* SituacoesController Test cases generated on: 2010-03-31 22:38:57 : 1270085937*/
App::import('Controller', 'Situacoes');

class TestSituacoes extends SituacoesController {
	var $autoRender = false;
}

class SituacoesControllerTest extends CakeTestCase {
	var $Situacoes = null;

	function startTest() {
		$this->Situacoes = new TestSituacoes();
		$this->Situacoes->constructClasses();
	}

	function testSituacoesControllerInstance() {
		$this->assertTrue(is_a($this->Situacoes, 'SituacoesController'));
	}

	function endTest() {
		unset($this->Situacoes);
	}
}
?>