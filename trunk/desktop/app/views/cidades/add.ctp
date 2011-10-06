<?php $session->flash(); ?>
<div class="usuarios form">
<?php echo $form->create('Cidade',array('action'=>'salvar'));?>
	<?php echo $form->input('id'); ?>
	<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
	<?php echo $form->input('uf', array('options'=>$uf,'empty'=>'--')); ?>
	<?php echo $form->submit('Salvar', array('div'=>false)); ?>
	<?php echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'cidades','action'=>'index')).'"')); ?>
<?php echo $form->end();?>
</div>
