<div class="turmas index">
<?php $session->flash(); ?>
<? echo $form->create('Turma',array('action'=>'index')); ?>
	<?php echo $form->input('classe_id', array('empty'=>'.:: SELECIONE ::.')); ?>
	<?php echo $form->input('congregacao_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Congregação')); ?>
	<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'50')); ?>
	<?php echo $form->submit('Pesquisar', array('div'=>false)); ?>
	<?php echo $form->submit('Novo', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'turmas','action'=>'add')).'"')); ?>
<? echo $form->end() ?>
<?= $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));?>
<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('Classe','Classe.nome');?></th>
			<th><?php echo $paginator->sort('Congregação','Congregacao.nome');?></th>
			<th><?php echo $paginator->sort('nome');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($turmas as $turma):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $turma['Turma']['id']; ?>
				</td>
				<td>
					<?php echo $turma['Classe']['nome']; ?>
				</td>
				<td>
					<?php echo $turma['Congregacao']['nome']; ?>
				</td>
				<td>
					<?php echo $turma['Turma']['nome']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link(__('Editar', true), array('action'=>'edit', $turma['Turma']['id'])); ?>
					<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $turma['Turma']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $turma['Turma']['id'])); ?>
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