<?php
class CongregacoesController extends AppController {
	var $name = "Congregacoes";
	var $components = array('Auth','Cookie','Session');
	var $helper = array('Session');
	var $uses = array('Usuario','Congregacao');
	
	function index(){
		
	}
	
	function add(){
		$this->set('sedes',$this->Congregacao->find('list'));
	}
	
	function save(){
		
	}
}
?>