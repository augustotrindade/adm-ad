<?php $session->flash(); ?>
<script>
$(document).ready(function(){
	$(".uf").change(function(){
		var SelcCidade = this.id;
		$.post("<? echo $html->url(array('action'=>'cidadesXml')); ?>", {uf: $("#"+SelcCidade).val()}, function(xml){
			$("."+SelcCidade).html('');
			var opt = '';
			opt += '<option value="">.:: SELECIONE ::.</option>';
			$('cidade',xml).each(function(){
				opt += '<option value="'+$('id',this).text()+'">'+$('nome',this).text()+'</option>';
			});
			$("."+SelcCidade).html(opt);
		});
	});
});
</script>
<div class="usuarios form">
<?php echo $form->create('Consagracao',array('action'=>'salvar'));?>
<? echo $form->input('id'); ?>
			<?php echo $form->input('membro_id',array('type'=>'hidden','value'=>$membro['Membro']['id'])); ?>
			<?php echo $form->input('nome_membro',array('value'=>$membro['Membro']['nome'],'disabled'=>true,'size'=>'50')); ?>
			<?php echo $form->input('funcao_id',array('empty'=>'.:: SELECIONE ::.','label'=>'Função')); ?>
			<?php echo $form->input('data_consagracao',array('label'=>'Data Consagração','dateFormat' => 'DMY','minYear' => 1900, 'maxYear' => date('Y'),'separator' =>' / ')); ?>
			<?php echo $form->input('uf',array('empty'=>'.:: SELECIONE ::.','options'=>$estados,'class'=>'uf')); ?>
			<?php echo $form->input('cidade_id',array('empty'=>'.:: SELECIONE ::.','class'=>'ConsagracaoUf')); ?>
			<?php echo $form->input('nome_igreja',array('size'=>'50','maxlength'=>'255')); ?>
			<?php echo $form->input('nome_pastor',array('size'=>'50','maxlength'=>'255')); ?>
			<input type="submit" value="Salvar"> <input type="button" value="Voltar" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'consagracoes','action'=>'index','id'=>$membro['Membro']['id'])) ?>'">
		</tr>
	</table>
<?php echo $form->end();?>
</div>
