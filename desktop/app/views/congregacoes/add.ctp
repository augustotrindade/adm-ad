<?php $session->flash(); ?>
<div class="congregacoes form">
<?php 
	echo $form->create('Congregacao',array('action'=>'save'));
	echo $form->input('id');
	echo $form->input('sede_id',array('empty' => '--------'));
	echo $form->input('codigo',array('maxlength'=>'40','readonly'=>'readonly'));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'80'));
	echo $form->input('endereco', array('size'=>'60','maxlength'=>'200'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'usuarios','action'=>'index')).'"'));
	echo $form->end();
?>
</div>