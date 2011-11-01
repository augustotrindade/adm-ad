<?php
class MenusController extends AppController {
	var $name = 'Menus';
	var $users = array('Menu');
	
	function index() {
		$this->set('parents',$this->Menu->generatetreelist());
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('menus', $this->paginate('Menu',$this->definirFiltroLike($array)));
	}
	
	function add() {
		$this->set('parents',$this->Menu->generatetreelist());
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Tipo contato inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Menu->read(null, $id);
		}
		$this->set('parents',$this->Menu->generatetreelist());
		$this->render('add');
	}

	function salvar($id = null){
		$this->set('parents',$this->Menu->generatetreelist());
		if (!$id) {
			if (!empty($this->data)) {
			$this->Menu->create();
				if ($this->Menu->save($this->data)) {
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
				if ($this->Menu->save($this->data)) {
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
		if ($this->Menu->del($id)) {
			$this->Session->setFlash(__('Tipo contato deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>