<?php 
/* SVN FILE: $Id$ */
/* LoginController Test cases generated on: 2010-03-23 22:44:54 : 1269395094*/
App::import('Controller', 'Login');

class TestLogin extends LoginController {
	var $autoRender = false;
}

class LoginControllerTest extends CakeTestCase {
	var $Login = null;

	function startTest() {
		$this->Login = new TestLogin();
		$this->Login->constructClasses();
	}

	function testLoginControllerInstance() {
		$this->assertTrue(is_a($this->Login, 'LoginController'));
	}

	function endTest() {
		unset($this->Login);
	}
}
?>