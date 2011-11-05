<?php $session->flash(); ?>
<div class="cartoes form">
<?php 
	echo $form->create('Cartao',array('action'=>'salvar'));
	echo $form->input('tipopessoa_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Tipo Pessoa'));
	echo $form->input('modelocartao_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Modelo Cartão'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'cartoes','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
