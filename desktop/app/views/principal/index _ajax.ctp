<div id="container">
	<div id="winsecretaria" style="width:700px; height:400px;display:none">
	
	</div>
	<div id="wintesouraria" style="width:700px; height:400px;display:none">

	</div>
	<div id="menu">
		<?php 
			$js_code = '';
			if(count($fotos)>0){
				foreach($fotos as $foto){
					echo $html->image($foto[0],array('title'=>$foto[1],'onclick'=>$foto[2])).'
';
					/*$js_code .= $ajax->remoteFunction(array('url'=>array('controller'=>'principal','action'=>$foto[3]),'update'=>'win'.$foto[3],'type'=>'get')).';
';*/
				}
			}
		?>
	</div>
</div>
<?
//echo $javascript->codeBlock($js_code);
?>
<script>
//new Ajax.Updater('winsecretaria','/adm-ad/desktop/principal/secretaria', {asynchronous:false, evalScripts:true, requestHeaders:['Accept', 'winsecretaria']});
//$.get('/adm-ad/desktop/principal/secretaria', function(data) {
//	$('winsecretaria').html(data);
//	alert('Load was performed.');
//});

//jQuery(document).ready(function(){
//	jQuery.get('/adm-ad/desktop/principal/secretaria',function(data){
//		jQuery("#winsecretaria").html(data);
//	});
//	jQuery.get('/adm-ad/desktop/principal/tesouraria',function(data){
//		jQuery("#wintesouraria").html(data);
//	});
//});
</script>