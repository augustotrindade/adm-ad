<?php
class Congregacao extends AppModel {
	var $name = "Congregacao";
	var $hasMany = array("Usuario");
	var $displayField = "nome";
}
?>