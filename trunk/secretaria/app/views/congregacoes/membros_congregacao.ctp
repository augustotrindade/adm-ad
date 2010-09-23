<h1 class="title"><b>Relatórios</b> >> Membros/Congregação</h1>
<? //pr($congregacao) ?>
<?php echo $form->create('Congregacao',array('action'=>'membrosCongregacao'));?>
<?php echo $form->input('congregacao_id',array('empty'=>'.:: SELECIONE ::.')); ?>
<input type="submit" value="Imprimir"> 
<?php echo $form->end();?>