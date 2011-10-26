<?php echo $this->Session->flash(); ?>
<div class="taloes form">
<?php 
	echo $form->create('Talao',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('congregacao_id',array('empty'=>'.:: SELECIONE ::.','label'=>'Congregação'));
	echo $form->input('inicial', array('size'=>'20','maxlength'=>'10'));
	echo $form->input('final', array('size'=>'20','maxlength'=>'10'));
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'taloes','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
