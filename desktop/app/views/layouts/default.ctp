<html>
<head>
	<?php echo $html->charset(); ?>
	<title>
		.:: Sistema de Gest&atilde;o de Igreja - <?=$title_for_layout?> ::.
	</title>
	<?php
		echo $html->meta('icon');
		
		echo $html->css('desktop');
		echo $html->css('menu');
		echo $html->css('themes_jquery/jquery-ui-1.8.16.custom');
		
		echo $html->script('jquery');
		echo $html->script('jquery.form');
		echo $html->script('jquery.jeditable');
		echo $html->script('jquery.ui.core');
		echo $html->script('jquery.ui.widget');
		echo $html->script('jquery.ui.tabs');
	?>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logado">
			<table border="0">
				<tr>
					<td width="60px"><b>Login:</b></td>
					<td><?= $this->Session->read('Auth.Usuario.login')?></td>
				</tr>
				<tr>
					<td><b>Congrega&ccedil;&atilde;o:</b></td>
					<td><?= $this->Session->read('Usuario.congregacao_nome')?></td>
				</tr>
			</table>
		</div>
	</div> <!-- end #header -->
	<div id="nav">
	
		<div class="menu4">
			<?php 
			if(isset($menu_principal) && array_key_exists(0, $menu_principal)) {
			    echo $menuarvore->galhos($menu_principal);
			} 
			?>
		</div>
		
	</div> <!-- end #nav -->
	<div id="content">
	<?php 
		echo $this->Session->flash();    
		echo $this->Session->flash('auth');
	
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