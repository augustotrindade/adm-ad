<?php
    $session->flash('auth');
    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('login');
    echo $form->input('senha');
    echo $form->end('Login');
?>
