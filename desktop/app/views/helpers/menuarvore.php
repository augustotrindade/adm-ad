<?php
class MenuarvoreHelper extends AppHelper {
	var $helpers = array('Html'); 
	
	function galhos($arvore){
		$result = '<ul>';
		if(is_array($arvore)){
			foreach ( $arvore as $k => $v ) {
				$result .= $this->folhas($v);
			}
		}
		$result .= '</ul>';
		return $this->output($result);
	}
	
	function folhas($no){
		$result = '<li class="'.$no['Menu']['class_css'].'">';
		$result .= $this->link($no);
		if(count($no['Menu']['filhos'])>0){
			$result .= $this->galhos($no['Menu']['filhos']);
		}
		$result .= '</li>';
		return $result;
	}
	
	function link($no){
		$url = array();
		
		if($no['Menu']['url']!=''){
			$url['url']=$no['Menu']['url'];
		} else {
			if($no['Menu']['controller']!=''){
				$url['controller']=$no['Menu']['controller'];
			}
			if($no['Menu']['action']!=''){
				$url['action']=$no['Menu']['action'];
			}
		}
		
		$result = $this->Html->link($no['Menu']['nome'],$url);
		
		return $result;
	}
}
?>