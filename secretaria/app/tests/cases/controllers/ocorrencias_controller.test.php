<?php 
/* SVN FILE: $Id$ */
/* OcorrenciasController Test cases generated on: 2010-04-22 22:10:42 : 1271985042*/
App::import('Controller', 'Ocorrencias');

class TestOcorrencias extends OcorrenciasController {
	var $autoRender = false;
}

class OcorrenciasControllerTest extends CakeTestCase {
	var $Ocorrencias = null;

	function startTest() {
		$this->Ocorrencias = new TestOcorrencias();
		$this->Ocorrencias->constructClasses();
	}

	function testOcorrenciasControllerInstance() {
		$this->assertTrue(is_a($this->Ocorrencias, 'OcorrenciasController'));
	}

	function endTest() {
		unset($this->Ocorrencias);
	}
}
?>