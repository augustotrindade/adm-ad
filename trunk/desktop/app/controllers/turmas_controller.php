<?php
class TurmasController extends AppController {

	var $name = 'Turmas';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	var $uses = array('Turma','Classe','Congregacao');
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('classes',$this->Classe->find('list'));
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->set('turmas', $this->paginate('Turma',$this->definirFiltroLike($array)));
	}
	
	function add() {
		$this->set('classes',$this->Classe->find('list'));
		$this->set('congregacoes',$this->Congregacao->find('list'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Turma inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Turma->read(null, $id);
		}
		$this->set('classes',$this->Classe->find('list'));
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->render('add');
	}

	function salvar($id = null){
		$this->set('classes',$this->Classe->find('list'));
		$this->set('congregacoes',$this->Congregacao->find('list'));
		if (!$id) {
			if (!empty($this->data)) {
			$this->Turma->create();
				if ($this->Turma->save($this->data)) {
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
				if ($this->Turma->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Turma', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Turma->del($id)) {
			$this->Session->setFlash(__('Turma deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>