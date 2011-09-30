<?php
class PrincipalController extends AppController {

	var $name = 'Principal';
	var $uses = array();
	var $layout = 'desktop';
	var $helpers = array('Html','Form','Javascript','Ajax','Jax');
	var $components = array('RequestHandler');
	
	function index() {
		$fotos[]=array('dock/music.png'		,'Músicas'		,'win("secretaria","Secretaria Geral");','secretaria');
		$fotos[]=array('dock/pictures.png'	,'Imagens'		,'win("tesouraria","Tesouraria");','tesouraria');
		$this->set('fotos',$fotos);
	}
	
	function secretaria(){		
		$this->render('secretaria', 'ajax');
	}
	
	function tesouraria(){		
		$this->render('tesouraria', 'ajax');
	}
}
?>