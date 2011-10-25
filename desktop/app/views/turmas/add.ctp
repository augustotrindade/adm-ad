<?php $session->flash(); ?>
<div class="turmas form">
<?php 
	echo $form->create('Turma',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('classe_id', array('empty'=>'.:: SELECIONE ::.'));
	echo $form->input('congregacao_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Congregação'));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'50'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'turmas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
