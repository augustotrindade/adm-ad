<?php
class AppController extends Controller {
	var $paginate = array('limit' => 50);
	var $components = array('Auth','Cookie','Session');
	var $uses = array('Congregacao');

	function beforeFilter() {
		
		$this->Auth->userModel = 'Usuario';
		$this->Auth->fields = array(
			'username' => 'login', 
			'password' => 'senha'
		);
		$this->Auth->allow('register');
		$aux2 = $this->Session->read('Auth.Usuario.congregacao_id');
		if(isset($aux2) && $aux2!=''){
			$c = $this->Congregacao->findById($aux2);
			$this->Session->write('Usuario.congregacao_nome',($c['Congregacao']['nome']));
		}else {
			$this->Session->write('Usuario.congregacao_nome','Admin');
		}
	}
}
?>