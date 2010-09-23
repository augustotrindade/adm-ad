<?php
class MembrosController extends AppController {

	var $name = 'Membros';
	var $helpers = array('CakePtbr.Formatacao','Time','Html', 'Form','Xml', 'Rss', 'Fpdf','Idade');
	var $uses = array('Membro','Congregacao','Funcao','Cidade');
	var $components = array('Upload');
	
	var $destino = 'fotos_cartao/';
	
	function index() {
		$condicao = array();
		//nome
		if (isset($this->data['Membro']['nome']) && $this->data['Membro']['nome']!='') {
			$this->set('nome',$this->data['Membro']['nome']);
			$nome = $this->data['Membro']['nome'];
			$condicao = array_merge($condicao, array('Membro.nome like'=>"%$nome%"));
		} elseif (isset($this->params['named']['nome']) && $this->params['named']['nome']!='') { 
			$this->set('nome',$this->params['named']['nome']);
			$nome = $this->params['named']['nome'];
			$this->data = array('Membro'=>array('nome'=>$this->params['named']['nome']));
			$condicao = array_merge($condicao, array('Membro.nome like'=>"%$nome%"));
		} else {
			$this->set('nome','');
			$nome = '';
			$condicao = array_merge($condicao, array('Membro.nome like'=>"%$nome%"));
		}
		//situacao
		if (isset($this->data['Membro']['situacao_id']) && $this->data['Membro']['situacao_id']!='') {
			$this->set('situacao',$this->data['Membro']['situacao_id']);
			$situacao = $this->data['Membro']['situacao_id'];
			$condicao = array_merge($condicao, array('Membro.situacao_id'=>$situacao));
		} elseif (isset($this->params['named']['situacao']) && $this->params['named']['situacao']!='') { 
			$this->set('situacao',$this->params['named']['situacao']);
			$situacao = $this->params['named']['situacao'];
			$this->data = array('Membro'=>array('situacao_id'=>$this->params['named']['situacao']));
			$condicao = array_merge($condicao, array('Membro.situacao_id'=>$situacao));
		} else {
			$this->set('situacao','');
			$situacao = '';
			//$condicao = array_merge($condicao);
		}
		//ID
		if (isset($this->data['Membro']['id']) && $this->data['Membro']['id']!='') {
			$this->set('id',$this->data['Membro']['id']);
			$id = $this->data['Membro']['id'];
			$condicao = array_merge($condicao, array('Membro.id'=>$id));
		} elseif (isset($this->params['named']['id']) && $this->params['named']['id']!='') { 
			$this->set('id',$this->params['named']['id']);
			$id = $this->params['named']['id'];
			$this->data = array('Membro'=>array('id'=>$this->params['named']['id']));
			$condicao = array_merge($condicao, array('Membro.id'=>$id));
		} else {
			$this->set('id','');
			$id = '';
			//$condicao = array_merge($condicao);
		}
		
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->Membro->recursive = 0;
		$this->set('membros', $this->paginate($condicao));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Membro inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('membro', $this->Membro->read(null, $id));
	}
	
	function add() {
		$this->set('estados',$this->Cidade->getEstados());
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->set('funcoes',$this->Funcao->find('list'));
		$this->set('cidades',array());
		$this->set('cidadesendereco',array());
	}
	
	function edit($id = null) {
		$this->set('estados',$this->Cidade->getEstados());
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$this->set('funcoes',$this->Funcao->find('list'));
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Membro inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Membro->read(null, $id);
			$this->set('cidades',$this->Cidade->find('list',array('conditions'=>array('uf'=>$this->data['Membro']['uf_nascimento']),'order'=>'nome')));
			$this->set('cidadesendereco',$this->Cidade->find('list',array('conditions'=>array('uf'=>$this->data['Membro']['uf_endereco']),'order'=>'nome')));
		}
		$this->render('add');
	}
	
	function nomeArquivo($ext='jpg'){
		return 'cartao_'.time().($ext[0]=='.'?$ext:'.'.$ext);
	}

	function salvar($id = null){
		if (!$id) {
			if (!empty($this->data)) {
				$this->Membro->create();
				if ($this->data['Membro']['filedata']['name']!='') {
					$destination = realpath($this->destino).'/';
					$nome = $this->nomeArquivo($this->Upload->ext($this->data['Membro']['filedata']['name']));
					$file = $this->data['Membro']['filedata'];
					$result = $this->Upload->upload($file, $destination, $nome, array('type' => 'resize', 'size'=>'800', 'output' => $this->Upload->ext($this->data['Membro']['filedata']['name'])));
					if (empty($this->Upload->errors)){
						$this->data['Membro']['foto'] = $this->Upload->result;
					}
				}
				if ($this->Membro->save($this->data)) {
					$this->Session->setFlash(__('Salvo com sucesso!', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->set('estados',$this->Cidade->getEstados());
					$this->set('congregacoes',$this->Congregacao->find('list'));//99572096
					$this->set('funcoes',$this->Funcao->find('list'));
					$this->set('cidades',$this->Cidade->find('list',array('conditions'=>array('uf'=>$this->data['Membro']['uf_nascimento']))));
					$this->set('cidadesendereco',$this->Cidade->find('list',array('conditions'=>array('uf'=>$this->data['Membro']['uf_endereco']))));
					$this->Session->setFlash(__('Não foi possível salvar. Tente novamente.', true));
					$this->render('add');
				}
			} else {
			$this->redirect(array('action'=>'add'));
			}
		} else {
			if (!empty($this->data)) {
				if ($this->data['Membro']['filedata']['name']!='') {
					$destination = realpath($this->destino).'/';
					$nome = $this->nomeArquivo($this->Upload->ext($this->data['Membro']['filedata']['name']));
					$file = $this->data['Membro']['filedata'];
					$result = $this->Upload->upload($file, $destination, $nome, array('type' => 'resize', 'size'=>'800', 'output' => $this->Upload->ext($this->data['Membro']['filedata']['name'])));
					if (empty($this->Upload->errors)){
						$this->data['Membro']['foto'] = $this->Upload->result;
					} else {
						die('morreu');
					}
				}
				if ($this->Membro->save($this->data)) {
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
			$this->Session->setFlash(__('Invalid id for Membro', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Membro->del($id)) {
			$this->Session->setFlash(__('Membro deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function cidadesXml(){
		$this->layout = 'xml/default';
		$uf = isset($this->params['form']['uf']) ? $this->params['form']['uf'] : null;
		if ($uf!=null) {
			$this->set('cidades',$this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$uf))));
		}
	}
	
	function imprime(){
		$this->layout = 'pdf'; 
		if (isset($this->params['form']['cartao'])) {
			$this->set('membros',$this->Membro->find('all',array('conditions'=>array('Membro.id'=>$this->params['form']['cartao']))));
		} else {
			$this->set('membros',array());
		}
		$this->render();
	}
	
	function aniversariantes(){
		$this->set('congregacoes',$this->Congregacao->find('list'));
		$order='MONTH(Membro.data_nascimento) ASC,DAYOFMONTH(Membro.data_nascimento) ASC';
		if($this->data){
			$conditions = array('situacao'=>true);
			if ($this->data['Membro']['data']['month']) {
				$conditions['MONTH(Membro.data_nascimento)'] = $this->data['Membro']['data']['month'];
			}
			if ($this->data['Membro']['congregacao_id']) {
				$conditions['congregacao_id'] = $this->data['Membro']['congregacao_id'];
			}
			$this->set('membros',$this->Membro->find('all',array('conditions'=>$conditions,'order'=>$order)));
		} else {
			$this->set('membros',$this->Membro->find('all',array('conditions'=>array('MONTH(Membro.data_nascimento)'=>date('m')),'order'=>$order)));
		}
	}
	
	function aniversariantesCarta(){
		$this->layout = 'pdf'; 
		$order='MONTH(Membro.data_nascimento) ASC,DAYOFMONTH(Membro.data_nascimento) ASC';
		
		$conditions = array('situacao'=>true);
		if(isset($this->params['named']['mes']) && $this->params['named']['mes']!=''){
			$conditions['MONTH(Membro.data_nascimento)'] = $this->params['named']['mes'];
		}
		if(isset($this->params['named']['congregacao_id']) && $this->params['named']['congregacao_id']!=''){
			$conditions['congregacao_id'] = $this->params['named']['congregacao_id'];
		}
		$membros = $this->Membro->find('all',array('conditions'=>$conditions,'order'=>$order));
		
		empty($membros) ? $membros = array() : null; 
		
		$this->set('membros',$membros);
		$this->render();
	}
	
	function ativar($id=null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Membro', true));
		}
		if (empty($this->data)) {
			$membro = $this->Membro->read(null, $id);
			$membro['Membro']['situacao'] = true;
			$this->Membro->save($membro);
			$this->Session->setFlash(__('Alterado com sucesso!', true));
		}
		$this->redirect(array('action'=>'index'));
	}
	
	function inativar($id=null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Membro', true));
		}
		if (empty($this->data)) {
			$this->data = $this->Membro->read(null,$id);
			
			$this->data['Membro']['situacao'] = false;
			
			
			if($this->Membro->save($this->data)){
				$this->Session->setFlash(__('Alterado com sucesso!', true));
			} else {
				$this->Session->setFlash(__('Erro ao salvar!', true));
			}
			
		}
		
		$this->redirect(array('action'=>'index'));
	}
	
}
?>