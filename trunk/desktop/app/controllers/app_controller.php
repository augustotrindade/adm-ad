<?php
class AppController extends Controller {
	var $paginate = array('limit' => 50);
	var $components = array('Auth','Cookie');

	function beforeFilter() {
		$this->Auth->userModel = 'Usuario';
		$this->Auth->fields = array(
			'username' => 'login', 
			'password' => 'senha'
		);
		$this->Auth->allow('register');
	}
}
?>