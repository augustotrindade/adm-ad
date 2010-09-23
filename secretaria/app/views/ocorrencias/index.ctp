<?php $session->flash(); ?>
<input type="button" value="Novo" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'ocorrencias','action'=>'add','id'=>$membro['Membro']['id'])) ?>'">
<?= $paginator->options(array('url' => array('id'=>$membro['Membro']['id'])));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="50px"><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Pequena Descrição','pequena_descricao');?></th>
	<th><?php echo $paginator->sort('Data Ocorrencia','data_ocorrencia');?></th>
	<th width="160px" class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($ocorrencias as $ocorrencia):
	$class = null;
	if ($i++ % 2 != 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $ocorrencia['Ocorrencia']['id']; ?>
		</td>
		<td>
			<?php echo $ocorrencia['Ocorrencia']['pequena_descricao']; ?>
		</td>
		<td>
			<?php echo $formatacao->data($ocorrencia['Ocorrencia']['data_ocorrencia']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Editar', true), array('action'=>'edit', $ocorrencia['Ocorrencia']['id'])); ?>
			<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $ocorrencia['Ocorrencia']['id'],'membro_id'=>$ocorrencia['Ocorrencia']['membro_id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $ocorrencia['Ocorrencia']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>