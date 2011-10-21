<?php
class GrauinstrucoesController extends AppController {
	var $name = "Grauinstrucoes";
	var $components = array('Auth','Cookie','Session');
	var $helper = array('Session');
	var $uses = array('Grauinstrucao');
	
	function index(){
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('grauinstrucoes', $this->paginate('Grauinstrucao',$this->definirFiltroLike($array)));
	}
	
	function add(){
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Grauinstrucao inv&aacute;lido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Grauinstrucao->read(null, $id);
		}
		$this->render('add');
	}
	
	function save($id = null){
		if (!$id) {
			if (!empty($this->data)) {
				$this->Grauinstrucao->create();
				if ($this->Grauinstrucao->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('N&atilde;o foi poss&iacute;vel salvar. Tente novamente.', true));
					$this->render('add');
				}
			}else {
				$this->redirect(array('action'=>'add'));
			}
		} else {
			if (!empty($this->data)) {
				if ($this->Grauinstrucao->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('N&atilde;o foi poss&iacute;vel salvar. Tente novamente.', true));
					$this->redirect(array('action'=>'edit','id'=>$id));
				}
			}
		}
	}
}
?>