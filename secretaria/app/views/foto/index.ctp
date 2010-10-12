<?php 
echo $form->create('', array('action' => 'upload', "enctype" => "multipart/form-data"));
echo $form->input('membro',array('type'=>'hidden'));
echo $form->input('image',array("type" => "file"));  
echo $form->end('Editar'); 
echo $form->end();
?>