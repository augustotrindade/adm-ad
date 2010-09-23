<?php
class SituacoesController extends AppController {

	var $name = 'Situacoes';
	var $helpers = array('Html', 'Form');
	
	function index() {
		if (isset($this->data['Situacao']['nome']) && $this->data['Situacao']['nome']!='') {
			$this->set('nome',$this->data['Situacao']['nome']);
			$nome = $this->data['Situacao']['nome'];
		} elseif (isset($this->params['named']['nome']) && $this->params['named']['nome']!='') {
			$this->set('nome',$this->params['named']['nome']);
			$nome = $this->params['named']['nome'];
			$this->data = array('Situacao'=>array('nome'=>$this->params['named']['nome']));
		} else {
			$this->set('nome','');
			$nome = '';
		}
		$this->Situacao->recursive = 0;
		$this->set('situacoes', $this->paginate(array('Situacao.nome like'=>"%$nome%")));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Situacao inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('cidade', $this->Situacao->read(null, $id));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Situacao inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Situacao->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Situacao->create();
				if ($this->Situacao->save($this->data)) {
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
				if ($this->Situacao->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Situacao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Situacao->del($id)) {
			$this->Session->setFlash(__('Situacao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function membrosSituacao(){
		$this->set('situacoes',$this->Situacao->find('list'));
		if($this->data){
			$this->layout = 'pdf'; 
			$this->Situacao->recursive = 2;
			$conditions = array();
			isset($this->data['Situacao']['situacao_id']) && $this->data['Situacao']['situacao_id']!='' ? $conditions['id'] = $this->data['Situacao']['situacao_id'] : null;
			$this->set('situacao',$this->Situacao->find('all',array('conditions'=>$conditions)));
			$this->render('membrosSituacaoPdf');
		}
	}
}
?>