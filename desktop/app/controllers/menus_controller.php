<?php
class MenusController extends AppController {
	var $name = 'Menus';
	var $helpers  = array('Nested');
	var $users = array('Menu');
	
	function index(){
//		$data['Menu']['parent_id']=10;
//		$data['Menu']['nome'] = 'Talões';
//		
//		$this->Menu->save($data);

		$dados = $this->Menu->generatetreegrouped();
		//$dados = $this->Menu->generatetreelist();
		//echo '<pre>';
		//pr($dados);
		//echo '</pre>';
		$this->set('menus',$dados);
		/*echo '<pre>';
		foreach ($dados as $k => $d){
			echo $k.$d.'<br/>';
		}
		echo '</pre>';*/
		
	}
}
?>