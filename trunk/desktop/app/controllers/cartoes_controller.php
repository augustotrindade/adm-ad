<?php
class CartoesController extends AppController {
	var $name = 'Cartoes';
	var $uses = array('Cartao','Tipopessoa','Modelocartao');
	
	function index() {
		$this->set('tipopessoas',$this->Tipopessoa->find('list'));
		$this->set('modelocartoes',$this->Modelocartao->find('list'));
		if(empty($this->data)){
			$array = $this->montarFiltro();
			$this->set('array',$array);
			$this->set('cartoes', $this->paginate('Cartao',$this->definirFiltroLike($array)));
		} else {
			$this->set('array',array());
			$this->set('cartoes', $this->paginate(array()));
		}
	}
	
	function add() {
		$this->set('tipopessoas',$this->Tipopessoa->find('list'));
		$this->set('modelocartoes',$this->Modelocartao->find('list'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Tipo contato inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Cartao->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Cartao->create();
				if ($this->Cartao->save($this->data)) {
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
				if ($this->Cartao->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Tipo contato', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cartao->del($id)) {
			$this->Session->setFlash(__('Tipo contato deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>