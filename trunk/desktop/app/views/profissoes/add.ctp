<?php $session->flash(); ?>
<div class="profissoes form">
<?php echo $form->create('Profissao',array('action'=>'salvar'));?>
	<?php echo $form->input('id'); ?>
	<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
	<?php echo $form->submit('Salvar', array('div'=>false)); ?>
	<?php echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'profissoes','action'=>'index')).'"')); ?>
<?php echo $form->end();?>
</div>
