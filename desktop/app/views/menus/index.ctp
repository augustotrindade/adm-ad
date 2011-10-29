<div class="menu4">
<?php 
if(array_key_exists(0, $menus)) {
    echo $nested->getCategories(0, $menus[0], $menus);
} 
?>
</div>