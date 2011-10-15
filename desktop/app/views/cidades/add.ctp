<?php $session->flash(); ?>
<div class="usuarios form">
<?php 
	echo $form->create('Cidade',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('nome', array('size'=>'40','maxlength'=>'255'));
	echo $form->input('uf', array('options'=>$uf,'empty'=>'--'));
	echo $form->submit('Salvar', array('div'=>false));
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'cidades','action'=>'index')).'"'));
 	echo $form->end();
 ?>
</div>
