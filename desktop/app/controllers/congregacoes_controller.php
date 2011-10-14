<?php
class CongregacoesController extends AppController {
	var $name = "Congregacoes";
	var $components = array('Auth','Cookie','Session');
	var $helper = array('Session');
	var $uses = array('Usuario','Congregacao');
	
	function index(){
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->Congregacao->recursive = 0;
		$this->set('congregacoes', $this->paginate('Congregacao',$this->definirFiltroLike($array)));
	}
	
	function add(){
		$this->set('sedes',$this->Congregacao->find('list'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Congregacao inv&aacute;lido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Congregacao->read(null, $id);
		}
		$this->set('sedes',$this->Congregacao->find('list'));
		$this->render('add');
	}
	
	function save($id = null){
		$this->set('sedes',$this->Congregacao->find('list'));
		if (!$id) {
			if (!empty($this->data)) {
				$this->Congregacao->create();
				if ($this->Congregacao->save($this->data)) {
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
				if ($this->Congregacao->save($this->data)) {
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