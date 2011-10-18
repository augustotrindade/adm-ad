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
			<ul>
				<li class="home"><? echo $html->link('HOME', array('controller'=>'principal','action'=>'index'))?></li>
				<li class="articles"><a href="#">SECRETARIA</a>
					<ul>
						<li class="show subsubl"><a href="#">Cadastros</a>
							<ul>
								<li class="user"><? echo $html->link('Pessoa', array('controller'=>'pessoas','action'=>'index'))?></li>
							</ul>
						</li>
						<li class="show subsubl"><a href="#">Controle</a>
							<ul>
								<li class="printer"><a href="#">Imprimir Cart&atilde;o</a></li>
								<li class="printer"><a href="#">Emitir Cartas</a></li>
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
						<li class="show subsubl"><a href="#">Entradas</a>
							<ul>
								<li class="articles"><a href="#">Last created</a></li>
								<li class="articles"><a href="#">First created</a></li>
								<li class="articles"><a href="#">All</a></li>
								<li class="articles"><a href="#">None</a></li>
							</ul>
						</li>
						<li class="articles"><a href="#">Sa&iacute;das</a></li>
					</ul>
				</li>
				<li class="escolaBiblica"><a href="#">ESCOLA BÍBLICA</a>
					
				</li>
				<li class="settings"><a href="#">CONFIGURA&Ccedil;&Otilde;ES</a>
					<ul>
						<li class="all"><? echo $html->link('Cidades',array('controller'=>'cidades','action'=>'index')) ?></li>
						<li class="all"><? echo $html->link('Profissões',array('controller'=>'profissoes','action'=>'index')) ?></li>
						<li class="all"><? echo $html->link('Congregações',array('controller'=>'congregacoes','action'=>'index')) ?></li>
						<li class="all"><? echo $html->link('Usuarios',array('controller'=>'usuarios','action'=>'index')) ?></li>
						<li class="all"><? echo $html->link('Tipo Pessoas',array('controller'=>'tipopessoas','action'=>'index')) ?></li>
					</ul>
				</li>
				<li class="logout"><? echo $html->link('SAIR', array('controller'=>'usuarios','action'=>'logout'))?></li>
			</ul>
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