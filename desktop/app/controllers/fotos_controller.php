<?php
class FotosController extends AppController {

	var $layout = 'popup';
	var $name = 'Fotos';
	var $uses = array();
	var $helpers = array('Html', 'Form','Cropimage');
	var $components = array('JqImgcrop');
	
	function index(){
		if(isset($this->params['named']['id']) && $this->params['named']['id']!=''){
			$this->set('pessoa',$this->params['named']['id']);
		} else {
			$this->set('pessoa','');
		}
	}
	
	function upload(){
		if (!empty($this->data) && $this->data['Foto']['image']['error']==0) { 
			$this->JqImgcrop->filename = time();
			$uploaded = $this->JqImgcrop->uploadImage($this->data['Foto']['image'], '/img/upload/', 'cartao_'); 
			$this->set('uploaded',$uploaded); 
		} else {
			$this->redirect(array('controller'=>'foto','action'=>'index','id'=>$this->data['pessoa']));
		}
	}
	
	function finalizar(){
		$caminho = $this->JqImgcrop->cropImage(150, $this->data['Foto']['x1'], $this->data['Foto']['y1'], $this->data['Foto']['x2'], $this->data['Foto']['y2'], $this->data['Foto']['w'], $this->data['Foto']['h'], $this->data['Foto']['imagePath'], $this->data['Foto']['imagePath']) ;
		$img = $_SERVER['HTTP_REFERER'].'/../../img/upload/'.basename($caminho);
		$foto = '../../img/upload/'.basename($caminho);
		$this->set('imagem',$img);
		$this->set('foto',$foto);
	}
}
?>