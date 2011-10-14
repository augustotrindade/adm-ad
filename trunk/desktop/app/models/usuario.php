<?php
class Usuario extends AppModel {
	var $name = 'Usuario';
	var $belongsTo = array(
		'Congregacao',
		'Pessoa'
	);
	var $validate = array(
		'login' => array('rule'=>'notempty'),
		'senha' => array('rule'=>'notempty')
	);
	
	
	function beforeSave() {
		return true;
	}
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
