<div class="usuarios index">
<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('nome');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($usuarios as $usuario):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $usuario['Usuario']['id']; ?>
				</td>
				<td>
					<?php echo $usuario['Usuario']['login']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $usuario['Usuario']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $usuario['Usuario']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $usuario['Usuario']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('Proximo', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>