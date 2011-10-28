<?php
class MenusController extends AppController {
	var $name = 'Menus';
	
	function index(){
		//$data['Menu']['parent_id']=5;
		//$data['Menu']['nome'] = 'SAIR';
		//$this->Menu->save($data);

		$this->Menu->moveUp(25);
		
		$dados = $this->Menu->generatetreelist(null, null, null,'.&nbsp;.&nbsp;');
		echo '<pre>';
		foreach ($dados as $k => $d){
			echo $k.$d.'<br/>';
		}
		
		die();
	}
}
?>