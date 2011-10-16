<div class="estadocivis index">
<?php $session->flash(); ?>
<? echo $form->create('Estadocivil',array('action'=>'index')); ?>
		<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
		<?php echo $form->submit('Pesquisar', array('div'=>false)); ?>
		<?php echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'estadocivis','action'=>'add')).'"')); ?>
<? echo $form->end() ?>
<?= $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="50px"><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nome');?></th>
	<th width="160px" class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($estadocivis as $estadocivil):
	$class = null;
	if ($i++ % 2 != 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $estadocivil['Estadocivil']['id']; ?>
		</td>
		<td>
			<?php echo $estadocivil['Estadocivil']['nome']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Editar', true), array('action'=>'edit', $estadocivil['Estadocivil']['id'])); ?>
			<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $estadocivil['Estadocivil']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $estadocivil['Estadocivil']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('Anterior', true), null, null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('Próximo', true).' >>', null, null, array('class'=>'disabled'));?>
</div>

