<?php
class TipopessoasController extends AppController {
	var $name = 'Tipopessoas';
	var $components = array ('Auth', 'Cookie', 'Session' );
	var $helper = array ('Session', 'Ajax' );
	var $uses = array ('Tipopessoa', 'Pessoa' );
	
	function index() {
		$array = $this->montarFiltro();
		$this->set('array',$array);
		$this->set ( 'tipopessoas', $this->paginate ( 'Tipopessoa' ,$this->definirFiltroLike($array)) );
	}
	
	function add() {
	}
	
	function save($id = null) {
		if (! $id) {
			if (! empty ( $this->data )) {
				$this->Tipopessoa->create ();
				if($this->Tipopessoa->save ( $this->data )){
					$this->Session->setFlash ( __ ( 'Salvo com sucesso!', true ) );
					$this->redirect ( array ('action' => 'index' ) );
				} else {
					$this->Session->setFlash ( __ ( 'N&atilde;o foi poss&iacute;vel salvar. Tente novamente.', true ) );
					$this->render ( 'add' );
				}
			} else {
				$this->redirect ( array ('action' => 'add' ) );
			}
		} else {
			if (! empty ( $this->data )) {
				if($this->Tipopessoa->save( $this->data )){
					$this->Session->setFlash ( __ ( 'Salvo com sucesso!', true ) );
					$this->redirect ( array ('action' => 'index' ) );
				} else {
					$this->Session->setFlash ( __ ( 'N&atilde;o foi poss&iacute;vel salvar. Tente novamente.', true ) );
					unset ( $this->data ['Tipopessoa'] ['senha'] );
					$this->redirect ( array ('action' => 'edit', 'id' => $id ) );
				}
			}
		}
		
	}
	
	function edit($id = null) {
		if (! $id && empty ( $this->data )) {
			$this->Session->setFlash ( __ ( 'Tipo pessoa inv&aacute;lido', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		if (empty ( $this->data )) {
			$this->data = $this->Tipopessoa->read ( null, $id );
		}
		$this->render ( 'add' );
	}
}

?>
