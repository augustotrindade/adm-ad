<?php
class TipocontatosController extends AppController {

	var $name = 'Tipocontatos';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('tipocontatos', $this->paginate('Tipocontato',$this->definirFiltroLike($array)));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Tipo contato inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Tipocontato->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		
		if (!$id) {
			if (!empty($this->data)) {
			$this->Tipocontato->create();
				if ($this->Tipocontato->save($this->data)) {
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
				if ($this->Tipocontato->save($this->data)) {
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
		if ($this->Tipocontato->del($id)) {
			$this->Session->setFlash(__('Tipo contato deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>