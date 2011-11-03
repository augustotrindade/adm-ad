<div class="cartoes index">
<?php 
	echo $this->Session->flash(); 
	echo $form->create('Cartao',array('action'=>'index'));
	echo $form->input('tipopessoa_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Tipo Pessoa'));
	echo $form->input('modelocartao_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Modelo Cartão'));
	echo $form->input('sequencial', array('size'=>'40','maxlength'=>'30'));
	echo $form->submit('Pesquisar', array('div'=>false)).' ';
	echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'cartoes','action'=>'add')).'"'));
	echo $form->end() 
?>
<?= $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));?>
<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('sequencial');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($cartoes as $cartao):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $cartao['Cartoes']['id']; ?>
				</td>
				<td>
					<?php echo $cartao['Cartoes']['sequencial']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $cartao['Cartoes']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $cartao['Cartoes']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $cartao['Cartoes']['id'])); ?>
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