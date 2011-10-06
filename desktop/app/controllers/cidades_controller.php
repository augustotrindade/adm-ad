<?php
class CidadesController extends AppController {

	var $name = 'Cidades';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	
	function index() {
		$this->set('cidades', $this->paginate('Cidade'));
	}
	
	function add() {
		$this->set('uf',$this->Cidade->getEstados());
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Cidade inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Cidade->read(null, $id);
		}
		$this->set('uf',$this->Cidade->getEstados());
		$this->render('add');
	}

	function salvar($id = null){
		$this->set('uf',$this->Cidade->getEstados());
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