<?php 
/* SVN FILE: $Id$ */
/* MembrosController Test cases generated on: 2010-03-25 23:25:38 : 1269570338*/
App::import('Controller', 'Membros');

class TestMembros extends MembrosController {
	var $autoRender = false;
}

class MembrosControllerTest extends CakeTestCase {
	var $Membros = null;

	function startTest() {
		$this->Membros = new TestMembros();
		$this->Membros->constructClasses();
	}

	function testMembrosControllerInstance() {
		$this->assertTrue(is_a($this->Membros, 'MembrosController'));
	}

	function endTest() {
		unset($this->Membros);
	}
}
?>