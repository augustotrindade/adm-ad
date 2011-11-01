<?php $session->flash(); ?>
<div class="menus form">
<?php 
	echo $form->create('Menu',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('parent_id',array('empty'=>'.:: SELECIONE ::.','label'=>'Pai'));
	echo $form->input('nome', array('size'=>'80','maxlength'=>'100'));
	echo $form->input('class_css', array('size'=>'80','maxlength'=>'100'));
	echo $form->input('style_css', array('size'=>'100','maxlength'=>'255'));
	echo $form->input('controller', array('size'=>'30','maxlength'=>'30'));
	echo $form->input('action', array('size'=>'30','maxlength'=>'30'));
	echo $form->input('url', array('size'=>'80','maxlength'=>'100'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'menus','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
