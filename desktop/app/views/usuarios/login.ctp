<?php 
	echo $this->Session->flash();
	echo $this->Session->flash('auth');
    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('login');
    echo $form->input('senha');
	echo $form->input('remember_me', array('type' => 'checkbox'));
    echo $form->end('Login');
?>
