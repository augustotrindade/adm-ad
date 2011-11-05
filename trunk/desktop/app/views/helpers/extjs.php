<?php
class ExtjsHelper extends AppHelper {
	var $helpers = array('Html'); 
	
	function linkConfirmYesNo($title, $url = null, $options = array(), $confirmMessage = false){
		return $this->Html->link($title, $url,array('onclick'=>'alert(\'ext-js\')'));
	}
}
?>