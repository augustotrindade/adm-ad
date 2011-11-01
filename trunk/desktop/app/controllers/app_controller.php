<?php
class AppController extends Controller {
	var $paginate = array('limit' => 50);
	var $components = array('Auth','Cookie','Session');
	var $helpers = array('Form','Session','Html','Javascript','Menuarvore');
	var $uses = array('Congregacao','Menu');

	function beforeFilter() {
		$this->Auth->userModel = 'Usuario';
		$this->Auth->fields = array(
			'username' => 'login', 
			'password' => 'senha'
		);
		$this->Auth->allow('register');
		$aux2 = $this->Session->read('Auth.Usuario.congregacao_id');
		if(isset($aux2) && $aux2!=''){
			$c = $this->Congregacao->findById($aux2);
			$this->Session->write('Usuario.congregacao_nome',($c['Congregacao']['nome']));
		}else {
			$this->Session->write('Usuario.congregacao_nome','Admin');
		}
		
		$menu_principal = $this->filhos($this->Menu->children(null,true));
		$this->set('menu_principal',$menu_principal);
	}
	
	function filhos($lista){
		if(count($lista)>0){
			foreach ($lista as $k => $v){
				if($this->Menu->childCount($v['Menu']['id'],true)>0){
					$filhos = $this->Menu->children($v['Menu']['id'],true);
					$lista[$k]['Menu']['filhos'] = $this->filhos($filhos);
				} else {
					$lista[$k]['Menu']['filhos'] = array();
				}
			}
		}
		return $lista;
	}
	
	function montarFiltro(){
		$retorno = array();
		if(isset($this->data)){
			if(count($this->data)>0){
				foreach ($this->data as $key => $value){
					if(count($value)>0){
						foreach ($value as $k => $v){
							$retorno[$key.'.'.$k]=$v;
						}
					}
				}
			}
		} elseif(isset($this->params['named'])) {
			$params = $this->params['named'];
			if(isset($params['sort'])){
				unset($params['sort']);
			}
			if(isset($params['direction'])){
				unset($params['direction']);
			}
			if(isset($params['page'])){
				unset($params['page']);
				if(count($params)>0){
					foreach ($params as $k => $v){
						if(substr($k,0,7)=="update_") {
							continue;
						}
						$retorno[$k]=$v;
						$aux = explode('.',$k);
						$this->data[$aux[0]][$aux[1]]=$v;
					}
				}
			}
		}
		return $retorno;
	}
	
	function definirFiltroLike($array){
		$aux = array();
		if (is_array($array)){
			foreach ($array as $k => $v ){
				$aux[$k.' LIKE'] = '%'.$v.'%';
			}
		}
		return $aux;
	}
}
?>