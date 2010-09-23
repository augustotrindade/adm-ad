<?php
class OcorrenciasController extends AppController {

	var $name = 'Ocorrencias';
	var $layout = 'popup';
	var $uses = array('Ocorrencia','Membro');
	var $helpers = array('CakePtbr.Formatacao','Time','Html', 'Form','Xml');
	
	function index($id = null){
		if ($id!=null) {
			$this->set('membro',$this->Membro->findById($id));
			$this->set('ocorrencias', $this->paginate(array('membro_id'=>$id)));
		} else {
			die('erro');
		}
	}
	
	function add($id=null){
		if ($id!=null) {
			$this->set('membro',$this->Membro->findById($id));
			$this->set('ocorrencias', $this->paginate(array('membro_id'=>$id)));
		} else {
			die('erro');
		}
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Ocorrencia inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Ocorrencia->read(null, $id);
			$this->set('membro',$this->Membro->findById($this->data['Ocorrencia']['membro_id']));
		}
		$this->render('add');
	}
	
	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
				if ($this->Ocorrencia->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index','id'=>$this->data['Ocorrencia']['membro_id']));
				} else {
					$this->set('membro',$this->Membro->findById($this->data['Ocorrencia']['membro_id']));
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->render('add');
				}
			} else {
				$this->redirect(array('action'=>'add'));
			}
		} else {
			if (!empty($this->data)) {
				if ($this->Ocorrencia->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index','id'=>$this->data['Ocorrencia']['membro_id']));
				} else {
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->redirect(array('action'=>'edit','id'=>$id));
				}
			} else {
				$this->redirect(array('action'=>'add'));
			}
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Ocorrencia', true));
			$this->redirect(array('action'=>'index','id'=>$this->params['named']['membro_id']));
		}
		if ($this->Ocorrencia->del($id)) {
			$this->Session->setFlash(__('Ocorrencia deleted', true));
			$this->redirect(array('action'=>'index','id'=>$this->params['named']['membro_id']));
		}
	}
}
?>