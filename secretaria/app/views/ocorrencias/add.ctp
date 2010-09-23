<?php $session->flash(); ?>

<div class="form">
<?php echo $form->create('Ocorrencia',array('action'=>'salvar'));?>
<? echo $form->input('id'); ?>
			<?php echo $form->input('membro_id',array('type'=>'hidden','value'=>$membro['Membro']['id'])); ?>
			<?php echo $form->input('nome_membro',array('value'=>$membro['Membro']['nome'],'disabled'=>true,'size'=>'50')); ?>
			<?php echo $form->input('data_ocorrencia',array('label'=>'Data Ocorrencia','dateFormat' => 'DMY','minYear' => 1900, 'maxYear' => date('Y'),'separator' =>' / ','type'=>'date')); ?>
			<?php echo $form->input('pequena_descricao',array('size'=>'50','maxlength'=>'255','label'=>'Pequena Descrição')); ?>
			<?php echo $form->input('descricao',array('cols'=>'50','rows'=>'3','label'=>'Descrição')); ?>
			<input type="submit" value="Salvar"> <input type="button" value="Voltar" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'ocorrencias','action'=>'index','id'=>$membro['Membro']['id'])) ?>'">
		</tr>
	</table>
<?php echo $form->end();?>
</div>
