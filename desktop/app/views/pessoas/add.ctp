<script>
$(function() {
	$("#tabs").tabs();
});
$(document).ready(function(){
	$(".uf").change(function(){
		var SelcCidade = this.id;
		
		var agu = '<option value="">.:: AGUARDE ::.</option>';
		$("."+SelcCidade).html(agu);
		
		$.post("<? echo $html->url(array('action'=>'cidadesXml')); ?>", {uf: $("#"+SelcCidade).val()}, function(xml){
			$("."+SelcCidade).html('');
			var opt = '';
			opt += '<option value="">.:: SELECIONE ::.</option>';
			$('cidade',xml).each(function(){
				opt += '<option value="'+$('id',this).text()+'">'+$('nome',this).text()+'</option>';
			});
			$("."+SelcCidade).html(opt);
		});
	});
});
</script>
<div class="pessoas form">
<?php 
	echo $form->create('Pessoa',array('action'=>'save'));
	echo $form->input('id');
?>
<div id="tabs">
	<ul>
		<li><a href="#dados_basicos">Dados Basicos</a></li>
		<li><a href="#pessoais">Pessoais</a></li>
		<li><a href="#endereco">Endere&ccedil;o</a></li>
		<li><a href="#contatos">Contatos</a></li>
		<li><a href="#ecleticos">Ecleticos</a></li>
		<li><a href="#ocorrencias">Ocorrencias</a></li>
		<li><a href="#dizimo">Historico Dizimo</a></li>
	</ul>
	<div id="dados_basicos">
		<?
		//ABA DADOS BASICOS
		echo $form->input('nome', array('size'=>'80','maxlength'=>'200'));
		?>
	</div>
	<div id="pessoais">
		<?
		//ABA PESSOAIS
		echo $form->input('estadocivil_id', array('label'=>'Estado Civil','empty'=>'.:: SELECIONE ::.'));
		echo $form->input('apelido', array('size'=>'40','maxlength'=>'50'));
		echo $form->input('nome_conjuge', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('nome_pai', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('nome_mae', array('size'=>'80','maxlength'=>'200'));
		
		//echo $form->input('Filho.0.id');
		//echo $form->input('Filho.0.nome');
		//echo $form->input('Filho.0.sexo');
		//echo $form->input('Filho.0.data_nascimento');
		//echo '<br>';
		//echo $form->input('Filho.1.id');
		//echo $form->input('Filho.1.nome');
		//echo $form->input('Filho.1.sexo');
		//echo $form->input('Filho.1.data_nascimento');
		?>
		<?php
		 echo $ajax->link('Ajax link', '/pessoas/add_filhos/', array(
		        'update' => 'filhos'
		  ));
		 ?>
		<div id="filhos">
			Criar código ajax para add filhos
			<?
				//echo $this->render(null, 'ajax', 'add_filhos');
			?>
		</div>
		<?
		//echo $javascript->codeBlock($ajax->remoteFunction(array('url'=>array('controller'=>'pessoas','action'=>'add_filhos'),'update'=>'filhos','type'=>'get')));
		?>
	</div>
	<div id="endereco">
		<?php
		//ABA ENDERECO
		echo $form->input('endereco', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('complemento', array('size'=>'80','maxlength'=>'250'));
		echo $form->input('bairro', array('size'=>'40','maxlength'=>'80'));
		echo $form->input('estadoendereco_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Estado','class'=>'uf'));
		echo $form->input('cidadeendereco_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Cidade','class'=>'PessoaEstadoenderecoId'));
		?>
	</div>
	<div id="contatos">
	contatos
	</div>
	<div id="ecleticos">
		<?
		//ABA ECLETICOS
		echo $form->input('congregacao_id',array('label'=>'Congregação','empty'=>'.:: SELECIONE ::.'))
		?>
	</div>
	<div id="ocorrencias">
		<?
		//ABA OCORRENCIAS
		if(isset($this->data['Ocorrencia']) && count($this->data['Ocorrencia'])>0){
			foreach($this->data['Ocorrencia'] as $o){
				echo $o['data'].' --> ';
				echo $o['ocorrencia'];
			}
		} else {
			echo 'N&atilde;o possui ocorrencias registradas';
		}
		?>
	</div>
	<div id="dizimo">
		<?
		//ABA OCORRENCIAS
		if(isset($this->data['Lancamento']) && count($this->data['Lancamento'])>0){
			foreach($this->data['Lancamento'] as $l){
				echo $o['data'].' --> ';
				echo $o['valor'];
			}
		} else {
			echo 'N&atilde;o possui dizimos registrados';
		}
		?>
	</div>
</div>
<br>
<?
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'pessoas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>