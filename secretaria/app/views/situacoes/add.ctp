<h1 class="title"><b><?= $html->link('Cadastros',array('controller'=>'usuarios','action'=>'index')) ?></b> >> Situações</h1>
<?php $session->flash(); ?>
<div class="usuarios form">
<?php echo $form->create('Situacao',array('action'=>'salvar'));?>
<? echo $form->input('id'); ?>
			<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
			<?php echo $form->input('ativo'); ?>
			<input type="submit" value="Salvar"> <input type="button" value="Voltar" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'usuarios','action'=>'index')) ?>'">
		</tr>
	</table>
<?php echo $form->end();?>
</div>
