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
	?>
</head>
<body>

<?php 
	echo $this->Session->flash();    
	echo $this->Session->flash('auth');
?>

<div id="wrapper">
	<div id="header"></div> <!-- end #header -->
	<div id="nav">
	
		<div class="menu4">
			<ul>
				<li class="home"><? echo $html->link('HOME', array('controller'=>'principal','action'=>'index'))?></li>
				<li class="articles"><a href="#">SECRETARIA</a>
					<ul>
						<li class="show subsubl"><a href="#">Cadastros</a>
							<ul>
								<li class="user"><? echo $html->link('Membros', array('controller'=>'membros','action'=>'index'))?></li>
							</ul>
						</li>
						<li class="show subsubl"><a href="#">Controle</a>
							<ul>
								<li class="printer"><a href="#">Imprimir Cart&atilde;o</a></li>
							</ul>
						</li>
						<li class="show subsubl"><a href="#">Relat&oacute;rios</a>
							<ul>
								<li class="articles"><a href="#">Lista de Membros</a></li>
								<li class="articles"><a href="#">Lista de Aniversariantes</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="tesouraria"><a href="#">TESOURARIA</a>
					<ul>
						<li class="add_user"><a href="#">Add new</a></li>
						<li class="show subsubl"><a href="#">Show</a>
							<ul>
								<li class="last"><a href="#">Last created</a></li>
								<li class="first"><a href="#">First created</a></li>
								<li class="all"><a href="#">All</a></li>
								<li class="none"><a href="#">None</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="settings"><a href="#">CONFIGURA&Ccedil;&Otilde;ES</a>
					<ul>
						<li class="all"><a href="#">Cidades</a></li>
						<li class="all"><a href="#">Profiss&otilde;es</a></li>
					</ul>
				</li>
				<li class="logout"><? echo $html->link('SAIR', array('controller'=>'usuarios','action'=>'logout'))?></li>
			</ul>
		</div>
		
	</div> <!-- end #nav -->
	<div id="content">
	<?php
		echo $content_for_layout;
	?>
	</div> <!-- end #content -->
	<div id="sidebar"></div> <!-- end #sidebar -->
	<div id="footer"></div> <!-- end #footer -->
	<div id="debug">
	<?php
		//echo $this->element('sql_dump'); 
	?>
	</div> <!-- end #footer -->
</div> <!-- End #wrapper -->
</body>
</html>