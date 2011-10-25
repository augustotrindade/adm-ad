<?php $session->flash(); ?>
<div class="classes form">
<?php 
	echo $form->create('Classe',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('nome', array('size'=>'40','maxlength'=>'30'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'classes','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
