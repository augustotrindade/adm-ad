<h1 class="title"><b>Relatórios</b> >> Aniversariantes</h1>

<?php echo $form->create('Membro',array('action'=>'aniversariantes'));?>
<?php echo $form->input('data', array('type'=>'date','dateFormat' => 'M','empty'=>'.:: SELECIONE ::.','label'=>'Mês')); ?>
<?php echo $form->input('congregacao_id',array('empty'=>'.:: SELECIONE ::.','label'=>'Congregação')); ?>
<input type="submit" value="Pesquisar"> <? if ($this->data){ ?> <input type="button" value="Imprimir Cartas" style="width:180px" onclick="javascript: window.location.href='<? echo $html->url(array('controller'=>'membros','action'=>'aniversariantesCarta','mes'=>$this->data['Membro']['data']['month'],'congregacao_id'=>$this->data['Membro']['congregacao_id'])) ?>'">  <?}?>
<?php echo $form->end();?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th width="50px">ID</th>
	<th width="300px">NOME</th>
	<th width="100px">IDADE</th>
	<th width="110px">DATA NASC.</th>
	<th>CONGREGAÇÃO</th>
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
		<td>
			<?php echo $membro['Membro']['nome']; ?>
		</td>
		<td style="text-align:center">
			<?php echo $idade->idade($membro['Membro']['data_nascimento']); ?> ANOS
		</td>
		<td style="text-align:center">
			<?php echo $formatacao->data($membro['Membro']['data_nascimento']); ?>
		</td>
		<td style="text-align:center">
			<?php echo $membro['Congregacao']['nome']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>