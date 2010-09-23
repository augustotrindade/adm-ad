<?php if ($session->check('Message.flash')){
    $session->flash();
}
?>
<? echo $form->create('',array('action'=>'logar')); ?>
	<? echo $form->input('login',array('maxlength'=>'30')) ?>
	<? echo $form->input('senha',array('type'=>'password')) ?>
	<? echo $form->submit('Logar') ?>
<? echo $form->end() ?>