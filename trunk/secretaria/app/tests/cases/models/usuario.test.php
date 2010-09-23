<?php 
/* SVN FILE: $Id$ */
/* Usuario Test cases generated on: 2010-03-23 18:56:57 : 1269381417*/
App::import('Model', 'Usuario');

class UsuarioTestCase extends CakeTestCase {
	var $Usuario = null;
	var $fixtures = array('app.usuario');

	function startTest() {
		$this->Usuario =& ClassRegistry::init('Usuario');
	}

	function testUsuarioInstance() {
		$this->assertTrue(is_a($this->Usuario, 'Usuario'));
	}

	function testUsuarioFind() {
		$this->Usuario->recursive = -1;
		$results = $this->Usuario->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Usuario' => array(
			'id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'login' => 'Lorem ipsum dolor ',
			'senha' => 'Lorem ipsum dolor sit amet',
			'nivel' => 1,
			'data_log' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>