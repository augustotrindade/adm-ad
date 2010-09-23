<?php
class CidadesController extends AppController {

	var $name = 'Cidades';
	var $helpers = array('Html', 'Form');
	
	function index() {
		if (isset($this->data['Cidade']['nome']) && $this->data['Cidade']['nome']!='') {
			$this->set('nome',$this->data['Cidade']['nome']);
			$nome = $this->data['Cidade']['nome'];
		} elseif (isset($this->params['named']['nome']) && $this->params['named']['nome']!='') {
			$this->set('nome',$this->params['named']['nome']);
			$nome = $this->params['named']['nome'];
			$this->data = array('Cidade'=>array('nome'=>$this->params['named']['nome']));
		} else {
			$this->set('nome','');
			$nome = '';
		}
		$this->Cidade->recursive = 0;
		$this->set('cidades', $this->paginate(array('Cidade.nome like'=>"%$nome%")));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Cidade inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('cidade', $this->Cidade->read(null, $id));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Cidade inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Cidade->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Cidade->create();
				if ($this->Cidade->save($this->data)) {
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
				if ($this->Cidade->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Cidade', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cidade->del($id)) {
			$this->Session->setFlash(__('Cidade deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>