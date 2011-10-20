<?php 
echo $html->css('imgareaselect-animated.css');
if(isset($javascript)){
	echo $javascript->link('jquery.imgareaselect.js');
}
$width = 150;
$height = 150;

echo $form->create('Foto', array('action' => 'finalizar',"enctype" => "multipart/form-data"));
echo $form->input('pessoa',array('type'=>'hidden'));
echo $form->hidden('name');
echo $cropimage->createJavaScript($uploaded['imageWidth'],$uploaded['imageHeight'],$width,$height);
echo $cropimage->createForm($uploaded["imagePath"], $width, $height);
echo $form->submit('Salvar', array("id"=>"save_thumb"));
echo $form->end();

?> 