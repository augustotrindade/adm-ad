<?php
class UsuariosController extends AppController {

	var $name = 'Usuarios';
	var $helpers = array('Html', 'Form');
	
	function index() {
		if (isset($this->data['Usuario']['nome']) && $this->data['Usuario']['nome']!='') {
			$this->set('nome',$this->data['Usuario']['nome']);
			$nome = $this->data['Usuario']['nome'];
		} elseif (isset($this->params['named']['nome']) && $this->params['named']['nome']!='') {
			$this->set('nome',$this->params['named']['nome']);
			$nome = $this->params['named']['nome'];
			$this->data = array('Usuario'=>array('nome'=>$this->params['named']['nome']));
		} else {
			$this->set('nome','');
			$nome = '';
		}
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate(array('Usuario.nome like'=>"%$nome%")));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Usuário inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Usuário inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Usuario->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Usuario->create();
				if ($this->Usuario->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->render('add');
				}
			} else {
			$this->redirect(array('action'=>'add'));
			}
		} else {
			if (!empty($this->data)) {
				if ($this->Usuario->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->redirect(array('action'=>'edit','id'=>$id));
				}
			}
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Usuario', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Usuario->del($id)) {
			$this->Session->setFlash(__('Usuario deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>