<div class="status form">
<?
	echo $form->create('',array('action'=>'save'));
	echo $form->input('Status.id');
	echo $form->input('Status.nome',array('size'=>'30','maxlength'=>'25'));
	echo $form->input('Status.ativo');
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'status','action'=>'index')).'"'));
	echo $form->end();
?>
</div>