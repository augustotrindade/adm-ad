<?php
class EstadocivisController extends AppController {

	var $name = 'Estadocivis';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->Estadocivil->recursive = 0;
		$this->set('estadocivis', $this->paginate('Estadocivil',$this->definirFiltroLike($array)));
	}
	
	function add() {
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Estado civil inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Estadocivil->read(null, $id);
		}
		$this->render('add');
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Estadocivil->create();
				if ($this->Estadocivil->save($this->data)) {
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
				if ($this->Estadocivil->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Estadocivil', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Estadocivil->del($id)) {
			$this->Session->setFlash(__('Estado civil deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>