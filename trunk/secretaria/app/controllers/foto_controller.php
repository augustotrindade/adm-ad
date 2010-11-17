<?php
class FotoController extends AppController {

	var $layout = 'popup';
	var $name = 'Foto';
	var $uses = array();
	var $helpers = array('Html', 'Form','Cropimage');
	var $components = array('JqImgcrop');
	
	function index($membro=null){
		if (!is_null($membro)) {
			$this->data['membro']=$membro;
		} 
	}
	
	function upload(){
		if (!empty($this->data) && $this->data['image']['error']==0) { 
			$this->JqImgcrop->filename = time();
			$uploaded = $this->JqImgcrop->uploadImage($this->data['image'], '/img/upload/', 'cartao_'); 
			$this->set('uploaded',$uploaded); 
		} else {
			$this->redirect(array('controller'=>'foto','action'=>'index','id'=>$this->data['membro']));
		}
	}
	
	function finalizar(){
		$caminho = $this->JqImgcrop->cropImage(150, $this->data['x1'], $this->data['y1'], $this->data['x2'], $this->data['y2'], $this->data['w'], $this->data['h'], $this->data['imagePath'], $this->data['imagePath']) ;
		$img = $_SERVER['HTTP_REFERER'].'/../../img/upload/'.basename($caminho);
		$foto = '../../img/upload/'.basename($caminho);
		$this->set('imagem',$img);
		$this->set('foto',$foto);
	}
}
?>