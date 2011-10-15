<?php
class PessoasController extends AppController {
	
	var $name = 'Pessoas';
	var $helpers = array('Html','Form','Javascript');
	var $uses = array('Pessoa');
	
	function index(){
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('pessoas', $this->paginate('Pessoa',$this->definirFiltroLike($array)));
	}
	
	function add(){
		
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Cidade inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Pessoa->read(null, $id);
		}
		$this->render('add');
	}
	
	function save($id = null){
		if (!$id) {
			if (!empty($this->data)) {
			$this->Pessoa->create();
				if ($this->Pessoa->save($this->data)) {
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
				if ($this->Pessoa->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->redirect(array('action'=>'edit','id'=>$id));
				}
			}
		}
	}
}
?>