<html>
<head>
	<?php echo $html->charset(); ?>
	<title>
		.:: Sistema de Gest&atilde;o de Igreja ::.
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('desktop');
	?>
</head>
<body>


<div id="wrapper">
	<div id="header"></div> <!-- end #header -->
	<div id="content">
	<?php
		echo $content_for_layout;
	?>
	</div> <!-- end #content -->
	<div id="footer"></div> <!-- end #footer -->
	<div id="debug">
	<?php
		//echo $this->element('sql_dump'); 
	?>
	</div> <!-- end #footer -->
</div> <!-- End #wrapper -->
</body>
</html>