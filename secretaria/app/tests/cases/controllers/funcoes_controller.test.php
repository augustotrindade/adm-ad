<?php 
/* SVN FILE: $Id$ */
/* FuncoesController Test cases generated on: 2010-03-25 19:38:15 : 1269556695*/
App::import('Controller', 'Funcoes');

class TestFuncoes extends FuncoesController {
	var $autoRender = false;
}

class FuncoesControllerTest extends CakeTestCase {
	var $Funcoes = null;

	function startTest() {
		$this->Funcoes = new TestFuncoes();
		$this->Funcoes->constructClasses();
	}

	function testFuncoesControllerInstance() {
		$this->assertTrue(is_a($this->Funcoes, 'FuncoesController'));
	}

	function endTest() {
		unset($this->Funcoes);
	}
}
?>