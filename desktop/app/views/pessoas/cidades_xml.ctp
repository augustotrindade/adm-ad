<cidades>
<? 
if (count($cidades)>0) {
	foreach ($cidades as $id => $cidade){
?>
	<cidade>
		<id><? echo $id ?></id>
		<nome><? echo $cidade ?></nome>
	</cidade>
<?
	}
}
?>
</cidades>