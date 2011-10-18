<?php
class Congregacao extends AppModel {

	var $name = "Congregacao";
	var $displayField = "codigo_nome";
	var $virtualFields = array(
		'codigo_nome' => "CONCAT(Congregacao.codigo, ' - ',Congregacao.nome)"
	);
	var $validate = array(
		'nome' => array('notempty')
	);
	
	var $hasMany = array(
		'Pessoa',
		'Usuario',
		'Talao'
	);
	var $belongsTo = array(
		'Sede' => array(
			'className' => 'Congregacao',
			'foreignKey' => 'sede_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function beforeSave() {
		if (isset($this->data['Congregacao']['nome'])) {
			$this->data['Congregacao']['nome'] = trim(strtoupper(strtr($this->data['Congregacao']['nome'],'���������','���������')));
		}
		$this->geraCodigo();
		return true;
	}
	
	function geraCodigo(){
		
		if (!isset($this->data['Congregacao']['codigo']) || $this->data['Congregacao']['codigo']=='') {
			if($this->data['Congregacao']['sede_id']!=''){
				$c = $this->find('all',array('conditions'=>array('Congregacao.sede_id'=>$this->data['Congregacao']['sede_id'])));
				if(empty($c)){
					$sede = $this->findById($this->data['Congregacao']['sede_id']);
					$codigo = $sede['Congregacao']['codigo'].'.1';
				} else {
					$maior = 0;
					foreach($c as $i){
						$aux = explode('.',$i['Congregacao']['codigo']);
						if($maior < (int) end($aux)){
							$maior = (int) end($aux);
							$codigo = $i['Sede']['codigo'].'.'.(end($aux)+1);
						}
					}
				}
			} else {
			
				$c = $this->find('all',array('conditions'=>array('Congregacao.sede_id is null')));
				if(empty($c)){
					$codigo = '1';
				} else {
					$codigos = array();
					foreach($c as $i){
						$codigos[] = (int) $i['Congregacao']['codigo'];
					}
					sort($codigos);
					$codigo = end($codigos)+1;
				}
			}
			$this->data['Congregacao']['codigo'] = $codigo;
			
			//echo '<pre>';
			//print_r($this->data['Congregacao']);
			//echo '</pre>';
		}
	}
}
?>