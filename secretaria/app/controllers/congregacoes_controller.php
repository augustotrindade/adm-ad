<?php
class CongregacoesController extends AppController {

	var $name = 'Congregacoes';
	var $uses = array('Congregacao','Membro');
	var $helpers = array('CakePtbr.Formatacao','Time','Html', 'Form','Fpdf','Idade');
	
	function index() {
		if (isset($this->data['Congregacao']['nome']) && $this->data['Congregacao']['nome']!='') {
			$this->set('nome',$this->data['Congregacao']['nome']);
			$nome = $this->data['Congregacao']['nome'];
		} elseif (isset($this->params['named']['nome']) && $this->params['named']['nome']!='') {
			$this->set('nome',$this->params['named']['nome']);
			$nome = $this->params['named']['nome'];
			$this->data = array('Congregacao'=>array('nome'=>$this->params['named']['nome']));
		} else {
			$this->set('nome','');
			$nome = '';
		}
		$this->Congregacao->recursive = 0;
		$this->set('congregacoes', $this->paginate(array('Congregacao.nome like'=>"%$nome%")));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Congregacao inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('cidade', $this->Congregacao->read(null, $id));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Congregacao inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Congregacao->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Congregacao->create();
				if ($this->Congregacao->save($this->data)) {
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
				if ($this->Congregacao->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Congregacao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Congregacao->del($id)) {
			$this->Session->setFlash(__('Congregacao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function membrosCongregacao(){
		$this->set('congregacoes',$this->Congregacao->find('list'));
		if($this->data){
			$this->layout = 'pdf'; 
			$this->Congregacao->recursive = 2;
			$conditions = array();
			isset($this->data['Congregacao']['congregacao_id']) && $this->data['Congregacao']['congregacao_id']!='' ? $conditions['id'] = $this->data['Congregacao']['congregacao_id'] : null;
			$this->set('congregacao',$this->Congregacao->find('all',array('conditions'=>$conditions)));
			$this->render('membrosCongregacaoPdf');
		}
	}
}
?>