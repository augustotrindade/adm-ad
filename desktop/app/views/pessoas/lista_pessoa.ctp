<div class="pessoas listaPessoa">

<? 
	echo $form->create('Pessoa',array('url'=>$this->params['named']));
	echo $form->input('nome', array('size'=>'40','maxlength'=>'255')); 
	echo $form->submit('Pesquisar', array('div'=>false));
	echo $form->end() 
?>

<?= $this->Paginator->options(array('url' => array_merge($array, $this->passedArgs)));?>

<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="50px"><?php echo $paginator->sort('id');?></th>
			<th><?php echo $paginator->sort('nome');?></th>
			<th><?php echo $paginator->sort('Congregação','Congregacao.nome');?></th>
			<th width="160px" class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($pessoas as $pessoa):
			$class = null;
			if ($i++ % 2 != 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td>
					<?php echo $pessoa['Pessoa']['id']; ?>
				</td>
				<td>
					<?php echo $pessoa['Pessoa']['nome']; ?>
				</td>
				<td style="text-align:center">
					<?php echo $pessoa['Congregacao']['nome']; ?>
				</td>
				<td>
				<?php
					$onclick = "";
					if(count($update)>0){
						foreach ($update as $k => $v){
							$onclick .= "opener.document.getElementById('$v').value='".$pessoa['Pessoa'][$k]."';";
						}
					}
					$onclick .= "window.close();"; 
					echo $form->button('Selecionar',array('type'=>'button','onclick'=>$onclick)); 
				?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="paging">
	<?php 
		echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));
		echo $paginator->numbers(array('separator'=>false));
		echo $paginator->next(__('Proximo', true).' >>', array(), null, array('class'=>'disabled'));
	?>
</div>
