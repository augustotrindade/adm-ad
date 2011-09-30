<div id="container">
	<div id="winsecretaria" style="width:700px; height:400px;display:none">
	outro teste
	<?
		//echo $ajax->link('link text', array('controller'=>'principal','action'=>'secretaria'), 
         //        array('update' => 'id_secretaria'));
		echo $ajax->div('id_secretaria');
		echo $ajax->divEnd('id_secretaria');
	?>
	</div>
	<div id="wintesoraria" style="width:700px; height:400px;display:none">
	outro testessss
	</div>
	<div id="menu">
		<?php 
			if(count($fotos)>0){
				foreach($fotos as $foto){
					//echo $html->image($foto[0],array('title'=>$foto[1],'onclick'=>$foto[2]));
					echo $ajax->link("<img src=\"/img/".$foto[0]."\" border=\"0\"/>", 
						array('controller'=>'principal','action'=>'secretaria'), 
						array('update' => 'id_secretaria'),null,FALSE);
				}
			}
		?>
		
	</div>
</div>