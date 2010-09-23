<h1 class="title"><b><?= $html->link('Cadastros',array('controller'=>'usuarios','action'=>'index')) ?></b> >> Cidades</h1>
<?php $session->flash(); ?>
<div class="usuarios form">
<?php echo $form->create('Cidade',array('action'=>'salvar'));?>
<? echo $form->input('id'); ?>
			<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
			<?php echo $form->input('uf', array('size'=>'10','maxlength'=>'2')); ?>
			<input type="submit" value="Salvar"> <input type="button" value="Voltar" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'usuarios','action'=>'index')) ?>'">
		</tr>
	</table>
<?php echo $form->end();?>
</div>
