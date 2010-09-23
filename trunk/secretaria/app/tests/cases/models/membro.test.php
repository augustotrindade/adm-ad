<?php 
/* SVN FILE: $Id$ */
/* Membro Test cases generated on: 2010-03-23 18:56:43 : 1269381403*/
App::import('Model', 'Membro');

class MembroTestCase extends CakeTestCase {
	var $Membro = null;
	var $fixtures = array('app.membro', 'app.congregacao', 'app.funcao');

	function startTest() {
		$this->Membro =& ClassRegistry::init('Membro');
	}

	function testMembroInstance() {
		$this->assertTrue(is_a($this->Membro, 'Membro'));
	}

	function testMembroFind() {
		$this->Membro->recursive = -1;
		$results = $this->Membro->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Membro' => array(
			'id' => 1,
			'congregacao_id' => 1,
			'funcao_id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'pai_nome' => 'Lorem ipsum dolor sit amet',
			'mae_nome' => 'Lorem ipsum dolor sit amet',
			'nasc_data' => '2010-03-23',
			'nasc_uf' => '',
			'nasc_cod_cid' => 1,
			'sexo' => 'Lorem ipsum dolor sit ame',
			'est_civil' => 'Lorem ipsum dolor ',
			'conjuge_nome' => 'Lorem ipsum dolor sit amet',
			'conjuge_crente' => 'Lorem ipsum dolor sit ame',
			'filhos' => 'Lorem ipsum dolor sit amet',
			'end' => 'Lorem ipsum dolor sit amet',
			'tel' => 'Lorem ipsum ',
			'cel' => 'Lorem ipsum ',
			'rg_num' => 'Lorem ipsum dolor ',
			'rg_org_exp' => 'Lorem ip',
			'rg_data_exp' => '2010-03-23',
			'cpf' => 'Lorem ipsum ',
			'ba_data' => 'Lorem ip',
			'ba_pastor' => 'Lorem ipsum dolor sit amet',
			'ba_igreja' => 'Lorem ipsum dolor sit amet',
			'ba_cid_uf' => 'Lorem ipsum dolor sit amet',
			'bes_data' => 'Lorem ip',
			'min_outro' => 'Lorem ipsum dolor sit amet',
			'min_cid_uf' => 'Lorem ipsum dolor sit amet',
			'min_forma' => 'Lorem ipsum dolor sit ame',
			'min_data' => 'Lorem ip',
			'profissao' => 'Lorem ipsum dolor sit amet',
			'escolar' => 1,
			'hist_coop' => 'Lorem ipsum dolor sit amet',
			'hist_dc' => 'Lorem ipsum dolor sit amet',
			'hist_pb' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'hist_ev' => 'Lorem ipsum dolor sit amet',
			'hist_pr' => 'Lorem ipsum dolor sit amet',
			'situacao' => 1,
			'cad_por' => 1,
			'alter_cad_data' => 1,
			'cad_data' => 1,
			'card_imp' => 1,
			'foto' => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>