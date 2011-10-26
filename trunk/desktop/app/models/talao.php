<?php
class Talao extends AppModel {
	
	var $name = 'Talao';
	var $validate = array(
		'inicial' => array(
			'validacao1'=>array(
				'rule'=>'notempty',
				'message'=>'Este campo não pode ser deixado em branco'
			),
			'validacao2'=>array(
				'rule'=>'numeric',
				'message'=>'Somente números.'
			),
			'validacao3'=>array(
				'rule'=>'intervalorNumero',
				'message'=>'Intervalo inválido'
			)
		),
		'final' => array(
			'validacao1'=>array(
				'rule'=>'notempty',
				'message'=>'Este campo não pode ser deixado em branco'
			),
			'validacao2'=>array(
				'rule'=>'numeric',
				'message'=>'Somente números.'
			),
			'validacao3'=>array(
				'rule'=>'intervalorNumero',
				'message'=>'Intervalo inválido'
			)
		),
		'congregacao_id' => array('rule'=>'notempty')
	);
	var $belongsTo = array(
		'Congregacao'
	);
	var $hasMany = array(
		'Folhatalao'
	);
	
	function intervalorNumero() {
		$condicoes[] = array('Congregacao.id'=>$this->data['Talao']['congregacao_id']);
		$condicoes['OR'] = array();
		$condicoes['OR'][] = array('Talao.inicial BETWEEN ? AND ?'=>array($this->data['Talao']['inicial'],$this->data['Talao']['final']));
		$condicoes['OR'][] = array('Talao.final BETWEEN ? AND ?'=>array($this->data['Talao']['inicial'],$this->data['Talao']['final']));
		$condicoes['OR'][] = array('? BETWEEN Talao.inicial AND Talao.final'=>array($this->data['Talao']['inicial']));
		$condicoes['OR'][] = array('? BETWEEN Talao.inicial AND Talao.final'=>array($this->data['Talao']['final']));
		$t = $this->find('first',array('conditions' => $condicoes,'recursive'=>0));
		if($t){
			return false;
		}
		return true;
	}
}
?>
