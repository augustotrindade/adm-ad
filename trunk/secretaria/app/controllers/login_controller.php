<?php
class LoginController extends AppController {

	var $uses = array('Usuario');
	var $layout = 'login';
	var $name = 'Login';
	var $helpers = array('Html', 'Form','Session');

	function index(){

	}

	function home(){
		$this->layout = 'default';
		if ((date("H")>=0) && (date("H")<12)) {
			$boasVindas="Bom dia ";
		} elseif ((date("H")>=12) && (date("H")<18)) {
			$boasVindas = "Boa tarde ";
		} else {
			$boasVindas = "Boa noite ";
		}
		$this->set('boasVindas',$boasVindas);
	}

	function logar(){
		$data = $this->data;
		if ($data['Usuario']['login']!='' && $data['Usuario']['senha']) {
			$conditions = array('Usuario.login'=>$data['Usuario']['login']);
			$fields = array('Usuario.*');
			$usuario = $this->Usuario->find($conditions,$fields);
			if ($usuario) {
				if ($usuario['Usuario']['senha']==$data['Usuario']['senha']) {
					unset($usuario['Usuario']['senha']);
					$usuario['Usuario']['tipo']='Usuario';
					$this->Session->write('logado',$usuario['Usuario']);
				} else {
					$this->Session->setFlash('Login/Senha inválidos');
					$this->redirect('/login/');
				}
			} else {
				$this->Session->setFlash('Login/Senha inválidos');
				$this->redirect('/login/');
			}
			$this->redirect('/'.$this->Session->read('url_r'));
		} else {
			$this->Session->setFlash('Login/Senha inválidos');
			$this->redirect('/login/');
		}
	}

	function sair(){
		if ($this->Session->check('logado')) {
			$this->Session->delete('logado');
		}
		$this->redirect(array('action'=>'index'));
	}
	
	function mudar_senha(){
		$this->layout = 'default';
	}
	
	function altera_senha(){
		$logado = $this->Session->read('logado');

		if ($this->data['Usuario']['senha_nova1']==$this->data['Usuario']['senha_nova2']) {
			$usuario = $this->Usuario->find(array('Usuario.id'=>$logado['id']));
			if ($usuario['Usuario']['senha']==($this->data['Usuario']['senha_antiga'])) {
				$this->Usuario->set(array('senha'=>$this->data['Usuario']['senha_nova1'],'id'=>$logado['id']));
				$this->Usuario->save();
				$this->Session->setFlash('Atualizado com sucesso!');
			} else {
				$this->Session->setFlash('Senha atual inválida!');
			}
		} else {
			$this->Session->setFlash('Senhas não conferem!');
		}
		
		$this->redirect(array('action'=>'mudar_senha'));
	}

}
?>