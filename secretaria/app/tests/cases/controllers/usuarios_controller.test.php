<?php 
/* SVN FILE: $Id$ */
/* UsuariosController Test cases generated on: 2010-03-23 23:04:23 : 1269396263*/
App::import('Controller', 'Usuarios');

class TestUsuarios extends UsuariosController {
	var $autoRender = false;
}

class UsuariosControllerTest extends CakeTestCase {
	var $Usuarios = null;

	function startTest() {
		$this->Usuarios = new TestUsuarios();
		$this->Usuarios->constructClasses();
	}

	function testUsuariosControllerInstance() {
		$this->assertTrue(is_a($this->Usuarios, 'UsuariosController'));
	}

	function endTest() {
		unset($this->Usuarios);
	}
}
?>