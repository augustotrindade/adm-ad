<?php
class CidadesController extends AppController {

	var $name = 'Cidades';
	var $uses = array();
	var $layout = 'desktop';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	var $components = array('RequestHandler');
	
	function index() {
		//$this->RequestHandler->setAjax($this);
	}
	
	function add(){
	
	}
	
	function save(){
		$this->redirect(array('action'=>'index'));
	}
}
?>