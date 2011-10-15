<div class="pessoas form">
<?php 
	echo $form->create('Pessoa',array('action'=>'save'));
	echo $form->input('id');
	echo $form->input('nome', array('size'=>'80','maxlength'=>'200'));
	echo $form->submit('Salvar', array('div'=>false));
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'pessoas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>