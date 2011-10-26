<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>.:: Sistema de Gestão de Membros ::.</title>
<?php 
echo $html->meta('icon');

echo $html->css('desktop');

echo $scripts_for_layout;
if (isset($javascript)) {
	echo $javascript->link('jquery'); 
}
?>
</head>
<body>
<?
echo $content_for_layout;
?> 

</body>
</html>