<?php 
/* SVN FILE: $Id$ */
/* CongregacoesController Test cases generated on: 2010-03-25 19:51:06 : 1269557466*/
App::import('Controller', 'Congregacoes');

class TestCongregacoes extends CongregacoesController {
	var $autoRender = false;
}

class CongregacoesControllerTest extends CakeTestCase {
	var $Congregacoes = null;

	function startTest() {
		$this->Congregacoes = new TestCongregacoes();
		$this->Congregacoes->constructClasses();
	}

	function testCongregacoesControllerInstance() {
		$this->assertTrue(is_a($this->Congregacoes, 'CongregacoesController'));
	}

	function endTest() {
		unset($this->Congregacoes);
	}
}
?>