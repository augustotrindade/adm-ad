<script>
$(function() {
	$("#tabs").tabs();
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
		<li><a href="#endereco">Endere&ccedil;o</a></li>
		<li><a href="#ecleticos">Ecleticos</a></li>
		<li><a href="#ecleticos">Ocorrencias</a></li>
		<li><a href="#ecleticos">Historico Dizimo</a></li>
	</ul>
	<div id="dados_basicos">
		<?
		//ABA DADOS BASICOS
		echo $form->input('nome', array('size'=>'80','maxlength'=>'200'));
		?>
	</div>
	<div id="endereco">
		<?php
		//ABA ENDERECO
		echo $form->input('endereco', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('complemento', array('size'=>'80','maxlength'=>'250'));
		echo $form->input('bairro', array('size'=>'40','maxlength'=>'80'));
		echo $form->input('estadoendereco_id', array('empty'=>'--------','label'=>'Estado'));
		echo $form->input('cidadeendereco_id', array('empty'=>'--------','label'=>'Cidade'));
		?>
	</div>
	<div id="ecleticos">
		teste
	</div>
</div>
<br>
<?
	echo $form->submit('Salvar', array('div'=>false));
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'pessoas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>