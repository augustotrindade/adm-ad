<?php 
echo $form->create('Foto', array('action' => 'upload', "enctype" => "multipart/form-data"));
echo $form->input('pessoa',array('type'=>'hidden','value'=>$pessoa));
echo $form->input('image',array("type" => "file"));  
echo $form->end('Upload'); 
echo $form->end();
?>