<?php 
    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('login');
    echo $form->input('senha', array('type'=>'password'));
    echo $form->end('Login');
?>
