<?php
class PessoasController extends AppController {
	
	var $name = 'Pessoas';
	var $helpers = array('Html','Form','Javascript','Xml','Ajax');
	var $uses = array('Pessoa','Cidade','Congregacao','Estadocivil','Tipopessoa','Status');
	var $components = array( 'RequestHandler' );
	
	function index(){
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('pessoas', $this->paginate('Pessoa',$this->definirFiltroLike($array)));
	}
	
	function add(){
		$this->set('congregacoes',$this->Congregacao->find('list',array('order'=>'Congregacao.codigo')));
		$this->set('estadoenderecos',$this->Cidade->getEstados());
		$this->set('estadocivis',$this->Estadocivil->find('list'));
		$this->set('status',$this->Status->find('list'));
		$tipopessoas = $this->Pessoa->Tipopessoa->find('list');
		$this->set(compact('tipopessoas'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Cidade inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Pessoa->read(null, $id);
			$this->Session('qtde_filhos',count($this->data['Filho']));
			$this->set('cidadeenderecos',$this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$this->data['Cidadeendereco']['uf']),'order'=>'nome')));
		}
		$this->set('congregacoes',$this->Congregacao->find('list',array('order'=>'Congregacao.codigo')));
		$this->set('estadoenderecos',$this->Cidade->getEstados());
		$this->set('estadocivis',$this->Estadocivil->find('list'));
		$tipopessoas = $this->Pessoa->Tipopessoa->find('list');
		$this->set(compact('tipopessoas'));
		$this->render('add');
	}
	
	function save($id = null){
		if (!$id) {
			if (!empty($this->data)) {
				$this->Pessoa->create();
				if ($this->Pessoa->saveAll($this->data)) {
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
				if ($this->Pessoa->saveAll($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->redirect(array('action'=>'edit','id'=>$id));
				}
			}
		}
	}
	
	function cidadesXml(){
		$this->layout = 'xml/default';
		$cidades = array();
		$uf = isset($this->params['form']['uf']) ? $this->params['form']['uf'] : null;
		if ($uf!=null) {
			$cidades = $this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$uf)));
		}
		$this->set('cidades',$cidades);
	}
	
	function add_filhos(){
		if($this->Session->check('qtde_filhos')){
		
		}
	}
}
?>