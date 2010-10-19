<? $logado = $session->read('logado')?>
<center>
<br>
<br>
<? echo $boasVindas ?>
<b><? echo $logado['tipo']=='Usuario'? $logado['nome'] : ''?></b>

<p>&nbsp;</p>
<p>&nbsp;</p>

</center>