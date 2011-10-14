<?php
class AppController extends Controller {
	var $paginate = array('limit' => 1);
	var $components = array('Auth','Cookie','Session');
	var $uses = array('Congregacao');

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
			if(isset($params['page'])){
				unset($params['page']);
				if(count($params)>0){
					foreach ($params as $k => $v){
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