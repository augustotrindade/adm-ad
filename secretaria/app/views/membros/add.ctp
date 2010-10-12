<script>
jQuery(function($){
   $(".cep").mask("99999-999");
   $(".telefone").mask("(99)9999-9999");
   $(".cpf").mask("999.999.999-99");
});
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
<h1 class="title"><b><?= $html->link('Cadastros',array('controller'=>'membros','action'=>'index')) ?></b> >> Membros</h1>
<?php $session->flash(); ?>
<div class="membros form">
<?php echo $form->create('Membro',array('action'=>'salvar','enctype'=>'multipart/form-data'));?>
<? echo $form->input('id'); ?>
<?php echo $form->input('foto', array('type'=>'hidden')); ?>
<?php echo $form->input('foto_completo', array('type'=>'hidden')); ?>

<?php echo $html->image('/fotos_cartao/'.($this->data['Membro']['foto'] ? $this->data['Membro']['foto'] : 'sem_foto.gif'),array('width'=>'100px','border'=>'1px','id'=>'imgFoto')); ?>
<?php echo $html->link('FOTO',array('controller'=>'foto','action'=>'index','id'=>$this->data['Membro']['id']),array('onclick'=>"window.open(this.href,'page','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=600');return false;")); ?>
<fieldset>
	<legend>Dados pessoais</legend>
	<?php echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); ?>
	<?php echo $form->input('sexo',array('type'=>'select','empty'=>'.:: SELECIONE ::.','options'=>array('M'=>'Masculino','F'=>'Femenino'))); ?>
	<?php echo $form->input('data_nascimento', array('dateFormat' => 'DMY','minYear' => 1900, 'maxYear' => date('Y')-10,'separator' =>' / ')); ?>
	<?php echo $form->input('uf_nascimento',array('type'=>'select','empty'=>'.:: SELECIONE ::.','options'=>$estados,'label'=>'UF','class'=>'uf')); ?>
	<?php echo $form->input('cidadenascimento_id',array('empty'=>'.:: SELECIONE ::.','options'=>$cidades,'label'=>'Cidade','class'=>'MembroUfNascimento')); ?>
	<?php echo $form->input('estado_civil',array('type'=>'select','empty'=>'.:: SELECIONE ::.','options'=>array('S'=>'Solteiro','C'=>'Casado','D'=>'Divorciado','V'=>'Viúvo'))); ?>
	<?php echo $form->input('nome_conjuge', array('size'=>'40','maxlength'=>'255')); ?>
	<?php echo $form->input('nome_pai', array('size'=>'40','maxlength'=>'255')); ?>
	<?php echo $form->input('nome_mae', array('size'=>'40','maxlength'=>'255')); ?>
	<?php echo $form->input('num_filhos', array('size'=>'5','maxlength'=>'2','label'=>'Numero de Filhos')); ?>
	<?php echo $form->input('nome_filhos', array('label'=>'Nome dos Filhos','rows'=>'3','cols'=>'40')); ?>
</fieldset>
<fieldset>
	<legend>Endereço Residencial</legend>
	<?php echo $form->input('cep', array('size'=>'15','maxlength'=>'10','class'=>'cep')); ?>
	<?php echo $form->input('endereco', array('size'=>'60','maxlength'=>'255')); ?>
	<?php echo $form->input('quadra', array('size'=>'20','maxlength'=>'50')); ?>
	<?php echo $form->input('lote', array('size'=>'20','maxlength'=>'50')); ?>
	<?php echo $form->input('uf_endereco',array('type'=>'select','empty'=>'.:: SELECIONE ::.','options'=>$estados,'label'=>'UF','class'=>'uf')); ?>
	<?php echo $form->input('cidadeendereco_id',array('empty'=>'.:: SELECIONE ::.','options'=>$cidadesendereco,'label'=>'Cidade','class'=>'MembroUfEndereco')); ?>
	<?php echo $form->input('bairro',array('size'=>'30','maxlength'=>'100')); ?>
</fieldset>
<fieldset>
	<legend>Contato</legend>
	<?php echo $form->input('telefone', array('size'=>'15','maxlength'=>'13','class'=>'telefone')); ?>
	<?php echo $form->input('celular', array('size'=>'15','maxlength'=>'13','class'=>'telefone')); ?>
</fieldset>
<fieldset>
	<legend>Documentos</legend>
	<?php echo $form->input('numero_rg', array('size'=>'20','maxlength'=>'50','label'=>'Identidade')); ?>
	<?php echo $form->input('org_exp_rg', array('size'=>'20','maxlength'=>'50','label'=>'Órgão Expedidor')); ?>
	<?php echo $form->input('data_exp_rg', array('size'=>'20','maxlength'=>'50','label'=>'Data de Emissão')); ?>
	<?php echo $form->input('cpf', array('size'=>'20','maxlength'=>'14','class'=>'cpf')); ?>
</fieldset>
<fieldset>
	<legend>Igreja</legend>
	<?php echo $form->input('congregacao_id',array('label'=>'Congregação','empty'=>'.:: SELECIONE ::.')); ?>
	<?php echo $form->input('funcao_id',array('label'=>'Função','empty'=>'.:: SELECIONE ::.')); ?>
	<?php echo $form->input('data_batismo_aguas', array('size'=>'20','maxlength'=>'10')); ?>
	<?php echo $form->input('data_batismo_espirito', array('size'=>'20','maxlength'=>'10')); ?>
	<?php echo $form->input('situacao',array('type'=>'hidden')); ?>
</fieldset>
<? if (isset($this->data['Membro']['id'])){ ?>
<fieldset>
	<legend>Histórico</legend>
	<?php echo $html->link('Consagrações',array('controller'=>'consagracoes','action'=>'index','id'=>$this->data['Membro']['id']),array('onclick'=>"window.open(this.href,'page','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=600,height=400');return false;")); ?><br>
	<?php echo $html->link('Ocorrencias',array('controller'=>'ocorrencias','action'=>'index','id'=>$this->data['Membro']['id']),array('onclick'=>"window.open(this.href,'page2','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=600,height=400');return false;")); ?>
</fieldset>
<? } ?>
			<input type="submit" value="Salvar"> <input type="button" value="Voltar" onclick="javascript:window.location.href='<?= $html->url(array('controller'=>'membros','action'=>'index')) ?>'">
		</tr>
	</table>
<?php echo $form->end();?>
</div>
