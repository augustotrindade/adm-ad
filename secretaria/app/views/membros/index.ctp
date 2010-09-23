<div class="membros index">
<h1 class="title"><b>Cadastros</b> >> Membros</h1>
<?php $session->flash(); ?>
<? echo $form->create('Membro',array('action'=>'index')); ?>
		<?php echo $form->input('id', array('size'=>'10','maxlength'=>'5','type'=>'text')); ?>
		<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
		<?php echo $form->input('congregacao_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Congregação')); ?>
		<?php echo $form->input('situacao', array('options'=>array(''=>'.:: SELECIONE ::.',true=>'ATIVO',false=>'INATIVO'),'label'=>'Situação')); ?>
		<input type="submit" value="Pesquisar"> <input type="button" value="Novo" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'membros','action'=>'add')) ?>'">
<? echo $form->end() ?>
<?= $paginator->options(array('url' => array('nome'=>$nome,'id'=>$id,'congregacao_id'=>$congregacao,'situacao'=>$situacao)));?>
<?php echo $form->create('Membro',array('action'=>'imprime'));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="25px">&nbsp;</th>
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
		<td>
			<input type="checkbox" value="<? echo $membro['Membro']['id'] ?>" name="cartao[]">
		</td>
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
			<?php 
				echo $html->link(__('Editar', true), array('action'=>'edit', $membro['Membro']['id'])); 
				if ($membro['Membro']['situacao']==true){
					echo $html->link(__('Excluir', true), array('action'=>'inativar', $membro['Membro']['id']), null, sprintf(__('Tem certeza que deseja inativar o item # %s?', true), $membro['Membro']['id']));
				} else {
					echo $html->link(__('Incluir', true), array('action'=>'ativar', $membro['Membro']['id']), null, sprintf(__('Tem certeza que deseja ativar o item # %s?', true), $membro['Membro']['id'])); 
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<td colspan="5"><br><?php echo $paginator->counter('<b>%current%</b> de <b>%count%</b> item(ns) listado(s)'); ?></td>
	</tr>
	<tr>
		<td colspan="5"><? echo $form->submit('Imprimir') ?></td>
	</tr>
</table>
</div>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('Próximo', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>

<?php echo $form->end();?>