<?php $session->flash(); ?>
<div class="tipocontatos form">
<?php 
	echo $form->create('Tipocontato',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('nome', array('size'=>'40','maxlength'=>'255'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'tipocontatos','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
