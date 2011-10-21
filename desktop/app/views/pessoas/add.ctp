<script>
$(function() {
	$("#tabs").tabs();
});
$(document).ready(function(){
	$(".uf").change(function(){
		var SelcCidade = this.id;
		
		var agu = '<option value="">.:: AGUARDE ::.</option>';
		$("."+SelcCidade).html(agu);
		
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
<div class="pessoas form">
<?php 
	echo $form->create('Pessoa',array('action'=>'save'));
	echo $form->input('id');
?>
<div id="tabs">
	<ul>
		<li><a href="#dados_basicos">Dados Basicos</a></li>
		<li><a href="#documentos">Documentos</a></li>
		<li><a href="#pessoais">Pessoais</a></li>
		<li><a href="#endereco">Endere&ccedil;o</a></li>
		<li><a href="#contatos">Contatos</a></li>
		<li><a href="#ecleticos">Ecleticos</a></li>
		<li><a href="#ocorrencias">Ocorrencias</a></li>
		<li><a href="#dizimo">Historico Dízimo</a></li>
	</ul>
	<div id="dados_basicos">
		<?
		echo $form->input('foto', array('type'=>'hidden','id'=>'foto')); 
		echo $form->input('upload', array('type'=>'hidden','id'=>'upload','value'=>'false')); 
		?>
		<div onclick="window.open('<?php echo $html->url(array('controller'=>'fotos','action'=>'index','id'=>$this->data['Pessoa']['id'])); ?>','page','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=786,height=490');return false;">
			<?php 
			echo $html->image('/fotos_cartao/'.($this->data['Pessoa']['foto'] ? $this->data['Pessoa']['foto'] : 'sem_foto.gif'),array('width'=>'100px','border'=>'1px','id'=>'imgFoto')); 
			?>
		</div>
		<?
		//ABA DADOS BASICOS
		echo $form->input('nome', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('sexo',array('empty'=>'.:: SELECIONE ::.','options'=>$sexo));
		echo $form->input('status_id',array('empty'=>'.:: SELECIONE ::.','options'=>$status));
		echo $form->input('grauinstrucao_id',array('label'=>'Escolaridade','empty'=>'.:: SELECIONE ::.'));
		?>
		<fieldset>
			<legend>Naturalidade</legend>
			<?
			echo $form->input('data_nascimento', array('dateFormat' => 'DMY','minYear' => 1900, 'maxYear' => date('Y'),'separator' =>' / '));
			echo $form->input('estadonaturalidade_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Estado','class'=>'uf'));
			echo $form->input('cidadenaturalidade_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Cidade','class'=>'PessoaEstadonaturalidadeId'));
			?>
		</fieldset>
	</div>
	<div id="documentos">
		<fieldset>
			<legend>RG</legend>
		<?
			//RG
			echo $form->input('rg_numero',array('size'=>'20','maxlength'=>'15','label'=>'Numero'));
			echo $form->input('rg_emissao',array('dateFormat' => 'DMY','minYear' => 1900, 'maxYear' => date('Y'),'separator' =>' / ','label'=>'Emissão'));
			echo $form->input('rg_expedidor',array('size'=>'20','maxlength'=>'15','label'=>'Expeditor'));
		?>
		</fieldset>
		<?
		echo $form->input('cpf', array('size'=>'15','maxlength'=>'11'));
		?>
	</div>
	<div id="pessoais">
		<?
		//ABA PESSOAIS
		echo $form->input('estadocivil_id', array('label'=>'Estado Civil','empty'=>'.:: SELECIONE ::.'));
		echo $form->input('apelido', array('size'=>'40','maxlength'=>'50'));
		echo $form->input('nome_conjuge', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('nome_pai', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('nome_mae', array('size'=>'80','maxlength'=>'200','label'=>'Nome Mãe'));
		
		?>
		
		<div id="filhos">
			<fieldset>
				<legend>Filhos</legend>
				<table>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Sexo</th>
						<th>Data Nascimento</th>
						<th>Excluir</th>
					</tr>
					<?
					for($i=0; $i<5; $i++){
						$class = null;
						if ($i % 2 != 0) {
							$class = ' class="altrow"';
						}
					?>
					<tr <?php echo $class;?>>
						<td><?php echo ($i+1); echo $form->input('Filho.'.$i.'.id'); ?></td>
						<td><?php echo $form->input('Filho.'.$i.'.nome',array('div'=>'false','label'=>false)); ?></td>
						<td><?php echo $form->input('Filho.'.$i.'.sexo',array('div'=>'false','label'=>false)); ?></td>
						<td><?php echo $form->input('Filho.'.$i.'.data_nascimento',array('div'=>'false','label'=>false,'dateFormat' => 'DMY','minYear' => 1900, 'maxYear' => date('Y'),'separator' =>' / ')); ?></td>
						<td><?php echo $form->input('Filho.'.$i.'.excluir',array('div'=>false,'label'=>false,'type'=>'checkbox')); ?></td>
					</tr>
					<?
					}
					?>
				</table>
			</fieldset>
		</div>
	</div>
	<div id="endereco">
		<?php
		//ABA ENDERECO
		echo $form->input('endereco', array('size'=>'80','maxlength'=>'200'));
		echo $form->input('complemento', array('size'=>'80','maxlength'=>'250'));
		echo $form->input('bairro', array('size'=>'40','maxlength'=>'80'));
		echo $form->input('cep', array('size'=>'10','maxlength'=>'9'));
		echo $form->input('estadoendereco_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Estado','class'=>'uf'));
		echo $form->input('cidadeendereco_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Cidade','class'=>'PessoaEstadoenderecoId'));
		?>
	</div>
	<div id="contatos">
		<table>
			<tr>
				<th width="20px">#</th>
				<th>Contato</th>
				<th width="170px">Tipo Contato</th>
				<th width="65px">Excluir</th>
			</tr>
			<?
			for($i=0; $i<5; $i++){
				$class = null;
				if ($i % 2 != 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr <?php echo $class;?>>
				<td><?php echo ($i+1); echo $form->input('Contato.'.$i.'.id'); ?></td>
				<td><?php echo $form->input('Contato.'.$i.'.contato',array('div'=>'false','label'=>false,'size'=>'60','maxlength'=>'80')); ?></td>
				<td><?php echo $form->input('Contato.'.$i.'.tipocontato_id',array('empty'=>'.:: SELECIONE ::.','div'=>'false','label'=>false)); ?></td>
				<td><?php echo $form->input('Contato.'.$i.'.excluir',array('div'=>false,'label'=>false,'type'=>'checkbox')); ?></td>
			</tr>
			<?
			}
			?>
		</table>
	</div>
	<div id="ecleticos">
		<?
		//ABA ECLETICOS
		echo $form->input('congregacao_id',array('label'=>'Congregação','empty'=>'.:: SELECIONE ::.'))
		?>
		<fieldset>
			<legend>Tipo Pessoa</legend>
			<?
			$tipopessoa_id = array();
			if(isset($this->data['Tipopessoa']) && count($this->data['Tipopessoa'])>0){
				foreach($this->data['Tipopessoa'] as $tipopessoa){
					$tipopessoa_id[] = $tipopessoa['id'];
				}
			}
			if(count($tipopessoas)>0){
				foreach($tipopessoas as $k => $v){
				?>
					<input type="checkbox" name="data[Tipopessoa][]" value="<?= $k ?>" <?= in_array($k, $tipopessoa_id) ? 'checked':'' ?>> <?= $v?><br />
				<?	
				}
			}
			?>
		</fieldset>
	</div>
	<div id="ocorrencias">
		<table>
			<?
			//ABA OCORRENCIAS
			if(isset($this->data['Ocorrencia']) && count($this->data['Ocorrencia'])>0){
			?>
			<tr>
				<th width="150px" style="text-align:center">Data Ocorrencia</th>
				<th>Ocorrencia</th>
			</tr>
			<?
				$i = 0;
				foreach($this->data['Ocorrencia'] as $o){
					$class = null;
					if ($i++ % 2 != 0) {
						$class = ' class="altrow"';
					}
			?>
			<tr <?php echo $class;?>>
				<td style="text-align:center"><? echo $time->format('d/m/Y',$o['data']); ?></td>
				<td><? echo $o['ocorrencia']; ?></td>
			</tr>
			<?
				}
			} else {
			?>
			<tr>
				<td>N&atilde;o possui ocorrencias registradas</td>
			</tr>
			<?
			}
			?>
		</table>
	</div>
	<div id="dizimo">
		<table>
			<?
			//ABA OCORRENCIAS
			if(isset($this->data['Lancamento']) && count($this->data['Lancamento'])>0){
			?>
			<tr>
				<th>#</th>
				<th>Data</th>
				<th>Valor</th>
			</tr>
			<?
				foreach($this->data['Lancamento'] as $l){
					$i = 0;
					$class = null;
					if ($i++ % 2 != 0) {
						$class = ' class="altrow"';
					}
				?>
			<tr <?php echo $class;?>>
				<td><? echo $i; ?></td>
				<td style="text-align:center"><? echo $time->format('d/m/Y',$l['data']); ?></td>
				<td><? echo $this->Number->format($l['valor'],array('before'=>'R$ ','decimals'=>',','thousands'=>'.','places'=>2)); ?></td>
			</tr>
				<?
				}
			} else {
				echo 'N&atilde;o possui dizimos registrados';
			}
			?>
		</table>
	</div>
</div>
<br>
<?
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'pessoas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>