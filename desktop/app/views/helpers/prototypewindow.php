<?php  
class PrototypewindowHelper extends Helper { 
	var $helpers = array('Html', 'Javascript', 'Form'); 
	
	function params_for_javascript($params){
		$retorno = '{';
		$aux = array();
		while($a = each($params)){
			if(is_array($a['value'])){
				$aux[] = $this->params_for_javascript($a['value']);
			} elseif($a['key']!='0'){
				$aux[] = $a['key'].':\''.$a['value'].'\'';
			} else {
				$aux[] = $a['value'];
			}
			
		}
		$retorno .= implode(',',$aux);
		
		$retorno .= '}';
		return $retorno;
	}
	
	function link_to_prototype_dialog( $name, $content, $dialog_kind = 'alert', $options = array() , $html_options = array() ){
		if($dialog_kind==''){
			$dialog_kind='alert';
		}
		$js_code ="Dialog.".$dialog_kind."( '".$content."',  ". $this->params_for_javascript($options) ." ); ";
		$link = $this->Html->link(
				$name,
				($html_options['href']!='' ? $html_options['href'] : "").'#',
				array('onclick'=>($html_options['onclick']!='' ? $html_options['onclick'].';' : "").$js_code)
				);
		return $this->output($link);
	}
	
	function link_to_prototype_window( $name, $window_id, $options = array() , $html_options = array() ){
		$href = '';
		$onclick = '';
		if(array_key_exists('href',$html_options)){
			$href = $html_options['href'];
			unset($html_options['href']);
		} 
		if(array_key_exists('onclick',$html_options)){
			$onclick = $html_options['onclick'];
			unset($html_options['onclick']);
		}
		$js_code = "
			var win_$window_id;
			function window_".$window_id."(){
				if(win_".$window_id."!=null){
					Dialog.alert(\"Close the window 'Test' before opening it again!\",{width:200, height:130}); 
				} else {
					win_".$window_id." = new Window( '".$window_id."', ".$this->params_for_javascript($options)." );
					win_".$window_id.".show();
					win_".$window_id.".setDestroyOnClose();
					win_".$window_id.".setStatusBar('ADM-AD - O sistema da sua igreja');
					win_".$window_id.".showCenter();
					win_".$window_id.".setConstraint(true)
					myObserver = {
						onDestroy: function(eventName, win) {
							if (win == win_".$window_id.") {
								win_".$window_id." = null;
								Windows.removeObserver(this);
							}
						}
					}
				Windows.addObserver(myObserver);
					
				}
			}";
		echo $this->Javascript->codeBlock($js_code);
		if(count($html_options)>0){
				$link = $this->Html->link(
				$name,
				($href != '' ? $href : "").'#',
				array_merge(array('onclick'=>($onclick !='' ? $onclick.';' : "")." window_".$window_id."();"),$html_options));
		} else {
			$link = $this->Html->link(
				$name,
				($href != '' ? $href : "").'#',
				array('onclick'=>($onclick !='' ? $onclick.';' : "")." window_".$window_id."();"));
		}
		
		
		return $this->output($link);
	}
}
?>