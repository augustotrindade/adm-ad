<?php
class Usuario extends AppModel {
	
	var $belongsTo = array('Congregacao');
	
	function isAuthorized($user, $controller, $action) {
		
		switch ($action) {
			case 'default' :
				return false;
				break;
			case 'delete' :
				if ($user ['Usuario'] ['role'] == 'admin') {
					return true;
				}
				break;
		}
	}
}
?>
