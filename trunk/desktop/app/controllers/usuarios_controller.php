<?php
class UsuariosController extends AppController {
	var $name = 'Usuarios';
	var $components = array('Auth','Cookie');
	
	function beforeFilter() {
		$this->Auth->userModel = 'Usuario';
		$this->Auth->fields = array(
			'username' => 'login', 
			'password' => 'senha'
		);
	}
	
	function login(){
		if ($this->Auth->user()) {
			if (!empty($this->data)) {
				$cookie = array();
				$cookie['username'] = $this->data['Usuario']['login'];
				$cookie['password'] = $this->data['Usuario']['senha'];
				$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
				//unset($this->data['Usuario']['remember_me']);
			}
			$this->redirect($this->Auth->redirect());
		} else {
			echo "nada";
		}
		if (empty($this->data)) {
			$cookie = $this->Cookie->read('Auth.User');
			if (!is_null($cookie)) {
				if ($this->Auth->login($cookie)) {
					//  Limpa a mensagem auth, apenas nesse caso usamos ela.
					$this->Session->del('Message.auth');
					$this->redirect($this->Auth->redirect());
				}
			}
		}
	}
	
	function logout(){
		//$this->redirect($this->Auth->logout());
	}
	
	function registrar(){
		if ($this->data) {
			if ($this->data['Usuario']['senha'] == $this->Auth->password($this->data['Usuario']['confima_senha'])) {
				$this->User->create();
				$this->User->save($this->data);
			}
		}
	}
}

?>
