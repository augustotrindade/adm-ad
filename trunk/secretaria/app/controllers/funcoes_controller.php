<?php
class FuncoesController extends AppController {

	var $name = 'Funcoes';
	var $helpers = array('Html', 'Form');
	
	function index() {
		if (isset($this->data['Funcao']['nome']) && $this->data['Funcao']['nome']!='') {
			$this->set('nome',$this->data['Funcao']['nome']);
			$nome = $this->data['Funcao']['nome'];
		} elseif (isset($this->params['named']['nome']) && $this->params['named']['nome']!='') {
			$this->set('nome',$this->params['named']['nome']);
			$nome = $this->params['named']['nome'];
			$this->data = array('Funcao'=>array('nome'=>$this->params['named']['nome']));
		} else {
			$this->set('nome','');
			$nome = '';
		}
		$this->Funcao->recursive = 0;
		$this->set('funcoes', $this->paginate(array('Funcao.nome like'=>"%$nome%")));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Funcao inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('cidade', $this->Funcao->read(null, $id));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Funcao inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Funcao->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Funcao->create();
				if ($this->Funcao->save($this->data)) {
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
				if ($this->Funcao->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Funcao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Funcao->del($id)) {
			$this->Session->setFlash(__('Funcao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>