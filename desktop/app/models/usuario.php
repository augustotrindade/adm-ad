<?php
class Usuario extends AppModel {
	var $belongsTo = array(
		'Congregacao',
		'Pessoa'
	);
	var $validate = array(
		'login' => array('rule'=>'notempty')
		,
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
	
	function validateUniqueUsername(){
		$error=0;
		//Attempt to load based on data in the field
		$someone = $this->findByLogin($this->data['Usuario']['login']);
		// if we get a result, this user name is in use, try again!
		if (isset($someone['Usuario'])){
			$error++;
			//debug($someone);
			//exit;
		}
		return $error==0;
	}
}
?>
