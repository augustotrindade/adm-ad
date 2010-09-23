<?php
class ConsagracoesController extends AppController {

	var $name = 'Consagracoes';
	var $layout = 'popup';
	var $uses = array('Consagracao','Membro','Cidade','Funcao');
	var $helpers = array('CakePtbr.Formatacao','Time','Html', 'Form','Xml');
	
	function index($id=null){
		if ($id!=null) {
			$this->set('membro',$this->Membro->findById($id));
			$this->set('consagracoes', $this->paginate(array('membro_id'=>$id)));
		} else {
			die('erro');
		}
	}
	
	function add($id=null){
		if ($id!=null) {
			$this->set('estados',$this->Cidade->getEstados());
			$this->set('membro',$this->Membro->findById($id));
			$this->set('funcoes',$this->Funcao->find('list',array('conditions'=>array('obreiro'=>true))));
			$this->set('cidades',array());
		} else {
			die('erro');
		}
	}
	
	function edit($id = null) {
		$this->set('estados',$this->Cidade->getEstados());
		$this->set('funcoes',$this->Funcao->find('list',array('conditions'=>array('obreiro'=>true))));
		$this->set('cidades',array());
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Consagracao inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Consagracao->read(null, $id);
			$this->set('membro',$this->Membro->findById($this->data['Consagracao']['membro_id']));
			$this->set('cidades',$this->Cidade->find('list',array('conditions'=>array('uf'=>$this->data['Consagracao']['uf']))));
		}
		$this->render('add');
	}
	
	function cidadesXml(){
		$this->layout = 'xml/default';
		$uf = isset($this->params['form']['uf']) ? $this->params['form']['uf'] : null;
		if ($uf!=null) {
			$this->set('cidades',$this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$uf),'order'=>array('nome'))));
		}
	}
	
	function salvar($id = null){
		$this->set('estados',$this->Cidade->getEstados());
		$this->set('funcoes',$this->Funcao->find('list',array('conditions'=>array('obreiro'=>true))));
		if (!$id) {
			if (!empty($this->data)) {
				$this->Consagracao->create();
				if ($this->Consagracao->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index','id'=>$this->data['Consagracao']['membro_id']));
				} else {
					$this->set('membro',$this->Membro->findById($this->data['Consagracao']['membro_id']));
					$this->set('cidades',$this->Cidade->find('list',array('conditions'=>array('uf'=>$this->data['Consagracao']['uf']))));
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->render('add');
				}
			} else {
				$this->redirect(array('action'=>'add'));
			}
		} else {
			if (!empty($this->data)) {
				if ($this->Consagracao->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index','id'=>$this->data['Consagracao']['membro_id']));
				} else {
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->redirect(array('action'=>'edit','id'=>$id));
				}
			}
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Consagracao', true));
			$this->redirect(array('action'=>'index','id'=>$this->params['named']['membro_id']));
		}
		if ($this->Consagracao->del($id)) {
			$this->Session->setFlash(__('Consagracao deleted', true));
			$this->redirect(array('action'=>'index','id'=>$this->params['named']['membro_id']));
		}
	}
}
?>