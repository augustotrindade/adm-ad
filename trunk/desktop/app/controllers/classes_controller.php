<?php
class ClassesController extends AppController {

	var $name = 'Classes';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	var $uses = array('Classe');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('classes', $this->paginate('Classe',$this->definirFiltroLike($array)));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Classe inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Classe->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		
		if (!$id) {
			if (!empty($this->data)) {
			$this->Classe->create();
				if ($this->Classe->save($this->data)) {
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
				if ($this->Classe->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Classe', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Classe->del($id)) {
			$this->Session->setFlash(__('Classe deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>