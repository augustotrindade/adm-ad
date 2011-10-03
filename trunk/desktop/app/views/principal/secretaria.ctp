<div class="menulateral">
	<div id="secondpane" class="menu_list">
	  <p class="menu_head">Cadastros</p>
	    <div class="menu_body">
	        <a href="#" onClick="jQuery.get('/adm-ad/desktop/cidades',function(data){ jQuery('#winsecretaria .conteudo').html(data) })">Cidades</a>
	        <a href="#">Grau de Instru&ccedil;&atilde;o</a>
	        <a href="#">Membros</a>
	        <a href="#">Motivos</a>
	        <a href="#">Profiss&otilde;es</a>
	        <a href="#">Status</a>
	        <a href="#">Tipo Pessoas</a>
	    </div>
	</div>
</div>
<div class="conteudo">

</div>

<?
$js_code = 'jQuery("#secondpane p.menu_head").mouseover(function()
{
   jQuery(this).css({backgroundImage:"url(down.png)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
   jQuery(this).siblings().css({backgroundImage:"url(left.png)"});
})';
echo $javascript->codeBlock($js_code);
?>