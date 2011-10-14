<?php
class ProfissoesController extends AppController {

	var $name = 'Profissoes';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('profissoes', $this->paginate('Profissao',$this->definirFiltroLike($array)));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Profissao inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Profissao->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		
		if (!$id) {
			if (!empty($this->data)) {
			$this->Profissao->create();
				if ($this->Profissao->save($this->data)) {
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
				if ($this->Profissao->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Profissao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Profissao->del($id)) {
			$this->Session->setFlash(__('Profissao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>