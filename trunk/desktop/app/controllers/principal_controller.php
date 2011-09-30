<?php
class PrincipalController extends AppController {

	var $name = 'Principal';
	var $uses = array();
	var $layout = 'desktop';
	var $helpers = array('Html','Form','Javascript','Ajax');
	
	function index() {
		$fotos[]=array('dock/music.png'		,'Músicas'		,'win("secretaria")');
		$fotos[]=array('dock/pictures.png'	,'Imagens'		,'win("tesoraria")');
		$this->set('fotos',$fotos);
	}
	
	function teste(){
		$this->Redirect->goto('/principal/secretaria');
	}
	
	function secretaria(){
		
		$this->render('secretaria', 'ajax');
	}
}
?>