<div class="manter">
	<h1>Manter Cidade</h1>
<?
echo $jax->form(array('action'=>'index'),'post',array('update'=>'mydiv'));
echo $form->input('nome');
echo $form->input('uf');
echo $form->submit('Pesquisar');
//echo $ajax->form->end();
?>

</div>