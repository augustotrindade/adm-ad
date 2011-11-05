<div class="pessoas index">
<?php 
	echo $this->Session->flash(); 
	echo $form->create('Pessoa',array('action'=>'index'));
	echo $form->input('status_id',array('empty'=>'.:: SELECIONE ::.','options'=>$status));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'255'));
	echo $form->submit('Pesquisar', array('div'=>false));
	echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'pessoas','action'=>'add')).'"')); 
	echo $form->end(); 

	echo $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));
?>
<table cellpadding="0" cellspacing="0">
		<?php 
		//echo $html->tableHeaders(array($paginator->sort('id'),$paginator->sort('nome'),$paginator->sort('Congregação','Congregacao.nome'),$paginator->sort('Status','Status.nome')));
		?>
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('nome');?></th>
			<th><?php echo $paginator->sort('Congregação','Congregacao.nome');?></th>
			<th><?php echo $paginator->sort('Status','Status.nome');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($pessoas as $pessoa):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $pessoa['Pessoa']['id']; ?>
				</td>
				<td>
					<?php echo $pessoa['Pessoa']['nome']; ?>
				</td>
				<td style="text-align:center">
					<?php echo $pessoa['Congregacao']['nome']; ?>
				</td>
				<td style="text-align:center">
					<?php echo $pessoa['Status']['nome']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $pessoa['Pessoa']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $pessoa['Pessoa']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $pessoa['Pessoa']['id'])); ?>
					<?php echo $extjs->linkConfirmYesNo('teste',array('action'=>'delete', $pessoa['Pessoa']['id']));?>
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