<div class="menus index">
<?php $session->flash(); ?>
<?php
	echo $form->create('Menu',array('action'=>'index'));
	echo $form->input('parent_id',array('empty'=>'.:: SELECIONE ::.','label'=>'Pai'));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'255'));
	echo $form->submit('Pesquisar', array('div'=>false)).' ';
	echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'menus','action'=>'add')).'"'));
	echo $form->end(); 
?>
<?= $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));?>
<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('nome');?></th>
			<th><?php echo $paginator->sort('Pai','Parent.nome');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($menus as $menu):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $menu['Menu']['id']; ?>
				</td>
				<td>
					<?php echo $menu['Menu']['nome']; ?>
				</td>
				<td>
					<?php echo $menu['Parent']['nome']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $menu['Menu']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $menu['Menu']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $menu['Menu']['id'])); ?>
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