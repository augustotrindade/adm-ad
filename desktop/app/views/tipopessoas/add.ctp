<div class="tipopessoas form">
<?php 
	echo $form->create('Tipopessoa',array('action'=>'save'));
	echo $form->input('id');
	echo $form->input('ordem', array('size'=>'10','maxlength'=>'10'));
	echo $form->input('nome', array('size'=>'20','maxlength'=>'25'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'tipopessoas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>