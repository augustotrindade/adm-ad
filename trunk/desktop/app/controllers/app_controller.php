<?php
class AppController extends Controller {

	var $helpers = array('Javascript','Html','Session','Ajax');
	var $paginate = array('limit' => 50);
	
	function checkAdminSession() {
		if (!$this->Session->check('logado')) {
		//	$this->Session->write('url_r',$this->params['url']['url']);
		//	$this->Session->setFlash('Você não tem acesso a essa área');
		//	$this->redirect('/login/');
		//	exit;
		}
	}
	
	function beforeFilter() {
		/*if($this->RequestHandler->isAjax()) {
			Configure::write('debug', 0);
			$this->RequestHandler->setContent('javascript', 'text/javascript');
			$this->RequestHandler->respondAs('javascript');
			$this->layout = 'ajax';
		}*/
		//if (!($this->params['controller']=='login' && ($this->params['action']=='index' || $this->params['action']=='logar'))) {
		//	$this->checkAdminSession();
		//}
	}

}
?>