<?php
/* SVN FILE: $Id: default.ctp,v 1.2 2010-03-18 14:17:44 augusto Exp $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 1.2 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2010-03-18 14:17:44 $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>.:: Sistema de Gestão de Membros ::.</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('default');
		echo $html->css('jquery.fancybox-1.2.6.css');

		echo $scripts_for_layout;
		if (isset($javascript)) {
			echo $javascript->link('jquery'); 
			echo $javascript->link('jquery.maskedinput');
			echo $javascript->link('jquery_fancybox-1.2.6.js'); 
			echo $javascript->link('jquery_fancybox-1.2.6.pack.js'); 
		}
		$logado = $session->read('logado');
	?>
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
	</div>
</div>
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="sidebar1" class="sidebar">
			<ul>
				<li>
					<h2><?= $html->link('Index',array('controller'=>'login','action'=>'home')) ?></h2>
				</li>
				<li>
					<h2>CADASTROS</h2>
					<ul>
						<? if ($logado['admin']==true) { ?>
						<li><?= $html->link('Usuários',array('controller'=>'usuarios','action'=>'index')) ?></li>
						<li><?= $html->link('Cidades',array('controller'=>'cidades','action'=>'index')) ?></li>
						<li><?= $html->link('Funções',array('controller'=>'funcoes','action'=>'index')) ?></li>
						<li><?= $html->link('Congregações',array('controller'=>'congregacoes','action'=>'index')) ?></li>
						<li><?= $html->link('Situações',array('controller'=>'situacoes','action'=>'index')) ?></li>
						<? } ?>
						<li><?= $html->link('Membros',array('controller'=>'membros','action'=>'index')) ?></li>
					</ul>
				</li>
				<li>
					<h2>RELATÓRIOS</h2>
					<ul>
						<li><?= $html->link('Aniversariantes',array('controller'=>'membros','action'=>'aniversariantes')) ?></li>
						<li><?= $html->link('Membros/Congregação',array('controller'=>'congregacoes','action'=>'membrosCongregacao')) ?></li>
					</ul>
				</li>
				<li>
					<h2><?= $html->link('Mudar Senha',array('controller'=>'login','action'=>'mudar_senha')) ?></h2>
				</li>
				<li>
					<h2><?= $html->link('Sair',array('controller'=>'login','action'=>'sair')) ?></h2>
				</li>
			</ul>
		</div>
		<!-- start content -->
		<div id="content">
			<div class="flower"></div>
			<div class="post">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		<!-- end content -->
		
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end page -->
</div>
<div id="menu">
	<center><br>Copyright &copy; Assembléia de Deus. Todos os direitos reservados</center>
</div>
<div id="footer">

</div>
	<?php echo $cakeDebug; ?>
</body>
</html>