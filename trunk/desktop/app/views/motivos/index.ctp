<div class="motivos index">
<?php $session->flash(); ?>
<? echo $form->create('Motivo',array('action'=>'index')); ?>
		<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
		<?php echo $form->submit('Pesquisar', array('div'=>false)); ?>
		<?php echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'motivos','action'=>'add')).'"')); ?>
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
		foreach ($motivos as $motivo):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $motivo['Motivo']['id']; ?>
				</td>
				<td>
					<?php echo $motivo['Motivo']['nome']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $motivo['Motivo']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $motivo['Motivo']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $motivo['Motivo']['id'])); ?>
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