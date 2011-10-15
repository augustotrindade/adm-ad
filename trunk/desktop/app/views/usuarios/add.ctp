<div class="usuarios form">
<?php 
	echo $form->create('Usuario',array('action'=>'save'));
	echo $form->input('id');
	echo $form->input('pessoa_id',array('empty' => '--------'));
	echo $form->input('congregacao_id',array('empty' => '--------','label'=>'Congregações'));
	echo $form->input('login', array('size'=>'40','maxlength'=>'80'));
	echo $form->input('senha', array('size'=>'40','maxlength'=>'80','type'=>'password'));
	echo $form->submit('Salvar', array('div'=>false));
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'usuarios','action'=>'index')).'"'));
	echo $form->end();
?>
</div>