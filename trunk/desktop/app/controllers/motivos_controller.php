<?php
class MotivosController extends AppController {

	var $name = 'Motivos';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('motivos', $this->paginate('Motivo',$this->definirFiltroLike($array)));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Motivo inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Motivo->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		
		if (!$id) {
			if (!empty($this->data)) {
			$this->Motivo->create();
				if ($this->Motivo->save($this->data)) {
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
				if ($this->Motivo->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Motivo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Motivo->del($id)) {
			$this->Session->setFlash(__('Motivo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>