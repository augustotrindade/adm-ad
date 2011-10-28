<?php
class PessoasController extends AppController {
	
	var $name = 'Pessoas';
	var $helpers = array('Html','Form','Javascript','Xml','Ajax','Time','Cropimage','Number');
	var $uses = array('Pessoa','Cidade','Congregacao','Estadocivil','Tipopessoa','Status','Filho','Tipocontato','Contato','Grauinstrucao','Motivo');
	var $components = array( 'RequestHandler','Upload','JqImgcrop','Acl' );
	var $destino = 'fotos_cartao/';
	
	function index(){
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set('status',$this->Status->find('list'));
		$this->set('pessoas', $this->paginate('Pessoa',$this->definirFiltroLike($array)));
	}
	
	function add(){
		$this->set('congregacoes',$this->Congregacao->find('list',array('order'=>'Congregacao.codigo')));
		$this->set('estadonaturalidades',$this->Cidade->getEstados());
		$this->set('estadoenderecos',$this->Cidade->getEstados());
		$this->set('estadocivis',$this->Estadocivil->find('list'));
		$this->set('status',$this->Status->find('list'));
		$this->set('tipocontatos',$this->Tipocontato->find('list'));
		$this->set('grauinstrucoes',$this->Grauinstrucao->find('list'));
		$this->set('sexo',$this->Pessoa->getSexos());
		$this->set('motivoentradas',$this->Motivo->find('list'));
		$this->set('motivosaidas',$this->Motivo->find('list'));
		$tipopessoas = $this->Pessoa->Tipopessoa->find('list');
		$this->set(compact('tipopessoas'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Pessoa inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Pessoa->read(null, $id);
			$this->set('cidadeenderecos',$this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$this->data['Cidadeendereco']['uf']),'order'=>'nome')));
			$this->set('cidadenaturalidades',$this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$this->data['Cidadenaturalidade']['uf']),'order'=>'nome')));
		}
		$this->set('grauinstrucoes',$this->Grauinstrucao->find('list'));
		$this->set('sexo',$this->Pessoa->getSexos());
		$this->set('congregacoes',$this->Congregacao->find('list',array('order'=>'Congregacao.codigo')));
		$this->set('estadoenderecos',$this->Cidade->getEstados());
		$this->set('estadonaturalidades',$this->Cidade->getEstados());
		$this->set('estadocivis',$this->Estadocivil->find('list'));
		$this->set('status',$this->Status->find('list'));
		$this->set('tipocontatos',$this->Tipocontato->find('list'));
		$this->set('motivoentradas',$this->Motivo->find('list'));
		$this->set('motivosaidas',$this->Motivo->find('list'));
		$tipopessoas = $this->Pessoa->Tipopessoa->find('list');
		$this->set(compact('tipopessoas'));
		$this->render('add');
	}
	
	function save($id = null){
		$this->set('grauinstrucoes',$this->Grauinstrucao->find('list'));
		$this->set('sexo',$this->Pessoa->getSexos());
		$this->set('congregacoes',$this->Congregacao->find('list',array('order'=>'Congregacao.codigo')));
		$this->set('estadoenderecos',$this->Cidade->getEstados());
		$this->set('estadocivis',$this->Estadocivil->find('list'));
		$this->set('status',$this->Status->find('list'));
		$this->set('tipocontatos',$this->Tipocontato->find('list'));
		$tipopessoas = $this->Pessoa->Tipopessoa->find('list');
		$this->set(compact('tipopessoas'));
		$this->set('cidadeenderecos',$this->Cidade->find('list',array('conditions'=>array('Cidade.uf'=>$this->data['Pessoa']['estadoendereco_id']),'order'=>'nome')));
		$this->validar_filhos();
		$this->validar_contatos();
		$caminhoImagem = null;
		if (!$id) {
			if (!empty($this->data)) {
				$this->Pessoa->create();
				if ($this->data['Pessoa']['upload']!='false') {
					$destination = realpath($this->destino).'/'.basename($this->data['Pessoa']['foto']);
					copy(realpath('./img/upload/').'/'.basename($this->data['Pessoa']['foto']),$destination);
					$this->data['Pessoa']['foto'] = basename($this->data['Pessoa']['foto']);
				}
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
				if ($this->data['Pessoa']['upload']!='false') {
					$destination = realpath($this->destino).'/'.basename($this->data['Pessoa']['foto']);
					copy(realpath('./img/upload/').'/'.basename($this->data['Pessoa']['foto']),$destination);
					$this->data['Pessoa']['foto'] = basename($this->data['Pessoa']['foto']);
				}
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
	//olhar melhor esse codigo
	function apagarImagemAntiga($caminhoImagem=null){
		if(!is_null($caminhoImagem)){
			if(is_file($caminhoImagem)){
				unlink($caminhoImagem);
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
	
	function validar_filhos(){
		if(count($this->data['Filho'])>0){
			foreach($this->data['Filho'] as $k => $filho){
				$this->Filho->data = array('Filho'=>$filho);
				if(!$this->Filho->validates()){
					unset($this->data['Filho'][$k]);
				} else {
					if(isset($filho['excluir']) && $filho['excluir']==1){
						if($filho['id']){
							$this->Filho->delete($filho['id']);
						} 
						unset($this->data['Filho'][$k]);
					}
				}
			}
		}
		if(count($this->data['Filho'])==0){
			unset($this->data['Filho']);
		}
	}
	
	function validar_contatos(){
		if(count($this->data['Contato'])>0){
			foreach($this->data['Contato'] as $k => $contato){
				$this->Contato->data = array('Contato'=>$contato);
				if(!$this->Contato->validates()){
					unset($this->data['Contato'][$k]);
				} else {
					if(isset($contato['excluir']) && $contato['excluir']==1){
						if($contato['id']){
							$this->Contato->delete($contato['id']);
						} 
						unset($this->data['Contato'][$k]);
					}
				}
			}
		}
		if(count($this->data['Contato'])==0){
			unset($this->data['Contato']);
		}
	}
	
	function listaPessoa(){
		$update = array();
		if(isset($this->params['named']) || count($this->params['named'])>0){
			foreach ($this->params['named'] as $k => $v){
				if(substr($k,0,7)=="update_"){
					$update[str_replace('update_','',$k)]=$v;
				}
			}
		}
		$this->layout = 'popup';
		$array = $this->montarFiltro();
		$array = array_merge(array('Status.ativo'=>true),$array);
		$this->set('array',$array);
		$this->set('update',$update);
		$this->set('pessoas', $this->paginate('Pessoa',$this->definirFiltroLike($array)));
	}
	
	function permicao(){
		$aro = new Aro();
		$users = array(
			0 => array(
				'alias'=>'admin',
				'parent_id'=>1,
				'model'=>'User',
				'foreign_key'=>1
			)
		);
		foreach ($users as $data) {
			$aro->create();
			$aro->save($data);
		}
		exit();
	}
}
?>