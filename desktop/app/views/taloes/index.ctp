<div class="taloes index">
<?php $session->flash(); ?>
<? echo $form->create('Talao',array('action'=>'index')); ?>
		<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
		<?php echo $form->submit('Pesquisar', array('div'=>false)); ?>
		<?php echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'taloes','action'=>'add')).'"')); ?>
<? echo $form->end() ?>
<?= $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));?>
<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('Congregação','Congregacao.nome');?></th>
			<th><?php echo $paginator->sort('inicial');?></th>
			<th><?php echo $paginator->sort('final');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($taloes as $talao):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $talao['Talao']['id']; ?>
				</td>
				<td>
					<?php echo $talao['Congregacao']['nome']; ?>
				</td>
				<td style="text-align:center">
					<?php echo $talao['Talao']['inicial']; ?>
				</td>
				<td style="text-align:center">
					<?php echo $talao['Talao']['final']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $talao['Talao']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $talao['Talao']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $talao['Talao']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="paging">
	<?php 
		echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));
		echo $paginator->numbers(array('separator'=>false));
		echo $paginator->next(__('Proximo', true).' >>', array(), null, array('class'=>'disabled'));
	?>
</div>