<?php $session->flash(); ?>
<input type="button" value="Novo" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'consagracoes','action'=>'add','id'=>$membro['Membro']['id'])) ?>'">
<?= $paginator->options(array('url' => array('id'=>$membro['Membro']['id'])));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="50px"><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Função','Funcao.nome');?></th>
	<th><?php echo $paginator->sort('Data Consagração','data_consagracao');?></th>
	<th width="160px" class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($consagracoes as $consagracao):
	$class = null;
	if ($i++ % 2 != 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $consagracao['Consagracao']['id']; ?>
		</td>
		<td>
			<?php echo $consagracao['Funcao']['nome']; ?>
		</td>
		<td>
			<?php echo $formatacao->data($consagracao['Consagracao']['data_consagracao']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Editar', true), array('action'=>'edit', $consagracao['Consagracao']['id'])); ?>
			<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $consagracao['Consagracao']['id'],'membro_id'=>$consagracao['Consagracao']['membro_id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $consagracao['Consagracao']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>