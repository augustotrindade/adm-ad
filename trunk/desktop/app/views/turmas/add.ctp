<?php $session->flash(); ?>
<div class="turmas form">
<?php 
	echo $form->create('Turma',array('action'=>'salvar'));
	echo $form->input('id');
	echo $form->input('classe_id', array('empty'=>'.:: SELECIONE ::.'));
	echo $form->input('congregacao_id', array('empty'=>'.:: SELECIONE ::.','label'=>'Congregação'));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'50'));
?>
	<fieldset>
		<legend><b>Matriculados</b></legend>
		<table>
			<tr>
				<th width="60px">Excluir</th>
				<th>Aluno</th>
			</tr>
		<?
		for($i=0;$i<3;$i++){
			$class = null;
			if ($i % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<? 
					echo $form->input('Matriculado.'.$i.'.excluir',array('label'=>false,'div'=>false,'type'=>'checkbox')) 
					?>
				</td>
				<td>
					<? 
					echo $form->input('Matriculado.'.$i.'.id',array('div'=>false)); 
					echo $form->input('Matriculado.'.$i.'.pessoa_id',array('type'=>'hidden'));
					echo $form->input('Matriculado.'.$i.'.Pessoa.nome',array('type'=>'text','label'=>false,'div'=>false,'size'=>80,'disabled'=>true)).' ';
					echo $form->button('Selecionar',array('type'=>'button','onclick'=>"window.open('".$html->url(array('controller'=>'pessoas','action'=>'listaPessoa','update_id'=>'Matriculado'.$i.'PessoaId','update_nome'=>'Matriculado'.$i.'PessoaNome'))."','listaPessoa','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=786,height=500')")); 
					?>
				</td>
			<tr>
		<?
		}
		?>
		</table>
	</fieldset><br/>
<?	
	echo $form->submit('Salvar', array('div'=>false)).' ';
	echo $form->submit('Voltar', array('type'=>'button','div'=>false,'onclick'=>'javascript:window.location.href="'.$html->url(array('controller'=>'turmas','action'=>'index')).'"'));
	echo $form->end();
?>
</div>
