<div class="usuarios form">
<?php 
	echo $form->create('Usuario',array('action'=>'save'));
	echo $form->input('id');
	echo $form->input('pessoa_id',array('empty' => '--------'));
	echo $form->input('congregacao_id',array('empty' => '--------'));
	echo $form->input('login', array('size'=>'40','maxlength'=>'80'));
	echo $form->input('senha', array('size'=>'40','maxlength'=>'80','type'=>'password'));
	echo $form->submit('Salvar');
	echo $form->end();
?>
</div>