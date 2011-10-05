<div class="congregacoes form">
<?php 
	echo $form->create('Congregacao',array('action'=>'save'));
	echo $form->input('id');
	echo $form->input('sede_id');
	echo $form->input('codigo',array('maxlength'=>'40','disabled'=>'disabled'));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'80'));
	echo $form->input('endereco', array('size'=>'60','maxlength'=>'200'));
?>
</div>