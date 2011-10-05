<?php
class UsuariosController extends AppController {
	var $name = 'Usuarios';
	var $components = array('Auth','Cookie','Session');
	var $helper = array('Session','Ajax');
	var $uses = array('Usuario','Congregacao','Pessoa');
	
	function index(){
		$this->set('usuarios',$this->paginate('Usuario'));
	}
	
	function add(){
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->set('pessoas',$this->Pessoa->find('list'));
	}
	
	function save($id = null){
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->set('pessoas',$this->Pessoa->find('list'));
		if (!$id) {
			if (!empty($this->data)) {
				if(!$this->verificarSenha()){
					$this->Usuario->create();
					if ($this->Usuario->save($this->data)) {
						$this->Session->setFlash(__('Salvo com sucesso!', true));
						$this->redirect(array('action'=>'index'));
					} else {
						$this->Session->setFlash(__('N&atilde;o foi poss&iacute;vel salvar. Tente novamente.', true));
						unset($this->data['Usuario']['senha']);
						$this->render('add');
					}
				} else {
					$this->Session->setFlash(__('Senhas n&atilde;o conferem. Tente novamente.', true));
					$this->render('add');
				}
			}else {
				$this->redirect(array('action'=>'add'));
			}
		} else {
			if (!empty($this->data)) {
				if(!$this->verificarSenha()){
					if ($this->Usuario->save($this->data)) {
						$this->Session->setFlash(__('Salvo com sucesso!', true));
						$this->redirect(array('action'=>'index'));
					} else {
						$this->Session->setFlash(__('N&atilde;o foi poss&iacute;vel salvar. Tente novamente.', true));
						unset($this->data['Usuario']['senha']);
						$this->redirect(array('action'=>'edit','id'=>$id));
					}
				} else {
					$this->Session->setFlash(__('Senhas n&atilde;o conferem. Tente novamente.', true));
					$this->render('add');
				}
			}
		}
	}
	
	function edit($id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Usuario inv&aacute;lido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Usuario->read(null, $id);
			unset($this->data['Usuario']['senha']);
		}
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->set('pessoas',$this->Pessoa->find('list'));
		$this->render('add');
	}
	
	function login(){
		$this->layout = 'login';
		if ($this->Auth->user()) {
			if (!empty($this->data)) {
				$cookie = array();
				$cookie['username'] = $this->data['Usuario']['login'];
				$cookie['password'] = $this->data['Usuario']['senha'];
				$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
				unset($this->data['Usuario']['remember_me']);
			}
			$this->redirect($this->Auth->redirect());
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
		$this->redirect($this->Auth->logout());
	}
	
	function verificarSenha(){
		/*print_r($this->Auth->password($this->data['Usuario']['confirma_senha']));
		print_r($this->data['Usuario']);
		if ($this->data) {
			if ($this->data['Usuario']['senha'] != $this->Auth->password($this->data['Usuario']['confirma_senha'])) {
				return true;
			}
		}
		unset($this->data['Usuario']['senha']);*/
		return false;
	}
}

?>
