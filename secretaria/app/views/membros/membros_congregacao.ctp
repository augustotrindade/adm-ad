<h1 class="title"><b>Relatórios</b> >> Membros/Congregação</h1>

<?php echo $form->create('Membro',array('action'=>'membrosCongregacao'));?>
<?php echo $form->input('congregacao_id',array('empty'=>'.:: SELECIONE ::.')); ?>
<input type="submit" value="Pesquisar"> <? if ($this->data){ ?> <input type="button" value="Imprimir" style="width:180px" onclick="javascript: window.location.href='<? echo $html->url(array('controller'=>'membros','action'=>'membrosCongregacaoPdf','congregacao_id'=>$this->data['Membro']['congregacao_id'])) ?>'">  <?}?>
<?php echo $form->end();?>
<?= $paginator->options(array('url' => array('congregacao_id'=>$congregacao_id)));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="50px"><?php echo $paginator->sort('id');?></th>
	<th width="250px"><?php echo $paginator->sort('nome');?></th>
	<th width="110px"><?php echo $paginator->sort('Congregação','Congregacao.nome');?></th>
	<th width="110px"><?php echo $paginator->sort('Função','Funcao.nome');?></th>
	<th class="actions"><?php __('Opções');?></th>
</tr>
<?php
$i = 0;
foreach ($membros as $membro):
	$class = null;
	if ($i++ % 2 != 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td style="text-align:center">
			<?php echo str_pad($membro['Membro']['id'],4,0,STR_PAD_LEFT); ?>
		</td>
		<td title="<? echo $membro['Membro']['nome'] ?>">
			<?php echo substr($membro['Membro']['nome'],0,20).(strlen($membro['Membro']['nome'])>20?'...':''); ?>
		</td>
		<td style="text-align:center" title="<? echo $membro['Congregacao']['nome'] ?>">
			<?php echo substr($membro['Congregacao']['nome'],0,8).(strlen($membro['Congregacao']['nome'])>8?'...':''); ?>
		</td>
		<td style="text-align:center" title="<? echo $membro['Funcao']['nome'] ?>">
			<?php echo substr($membro['Funcao']['nome'],0,8).(strlen($membro['Funcao']['nome'])>8?'...':''); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Editar', true), array('action'=>'edit', $membro['Membro']['id'])); ?>
			<?php echo $html->link(__('Excluir', true), array('action'=>'delete', $membro['Membro']['id']), null, sprintf(__('Tem certeza que deseja excluir o item # %s?', true), $membro['Membro']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<td colspan="5"><br><?php echo $paginator->counter('<b>%current%</b> de <b>%count%</b> item(ns) listado(s)'); ?></td>
	</tr>
</table>
</div>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('Próximo', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>