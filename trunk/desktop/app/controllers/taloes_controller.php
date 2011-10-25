<?php
class TaloesController extends AppController {

	var $name = 'Taloes';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	var $uses = array('Talao','Congregacao');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('taloes', $this->paginate('Talao',$this->definirFiltroLike($array)));
	}
	
	function add() {
		$this->set('congregacoes',$this->Congregacao->find('list'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Talao inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Talao->read(null, $id);
		}
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->render('add');
	}

	function salvar($id = null){
		$this->set('congregacoes',$this->Congregacao->find('list'));
		if (!$id) {
			if (!empty($this->data)) {
			$this->Talao->create();
				if ($this->Talao->save($this->data)) {
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
				if ($this->Talao->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Talao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Talao->del($id)) {
			$this->Session->setFlash(__('Talao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>