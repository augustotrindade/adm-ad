<h1 class="title"><b>Mudar Senha</b></h1>
<?php if ($session->check('Message.flash')){
    $session->flash();
}
echo $form->create('',array('controller'=>'login','action'=>'altera_senha')); 
$logado = $session->read('logado');
?>
		<?= $logado['nome']?>
		<?= $form->input('senha_antiga', array('type'=>'password', 'label'=>'Senha Atual'))?>
		<?= $form->input('senha_nova1', array('type'=>'password', 'label'=>'Nova Senha','maxlength'=>6))?>
		<?= $form->input('senha_nova2', array('type'=>'password', 'label'=>'Redigite a senha','maxlength'=>6))?>
		<input type="submit" value="Salvar">&nbsp;&nbsp;&nbsp;
<?= $form->end() ?>