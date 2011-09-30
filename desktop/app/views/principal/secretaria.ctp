<div class="menulateral">
	<div id="secondpane" class="menu_list">
	  <p class="menu_head">Cadastros</p>
	    <div class="menu_body">
	        <a href="#">Cidades</a>
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
$js_code = '$("#secondpane p.menu_head").mouseover(function()
{
   $(this).css({backgroundImage:"url(down.png)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
   $(this).siblings().css({backgroundImage:"url(left.png)"});
});alert("teste")';
echo $javascript->codeBlock($js_code);
?>