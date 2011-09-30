<?php
/**
 * Helpar para calcular a idade a partir da
 * data de nascimento no formato do MySQL.
 * AAAA-MM-DD
 * utilizei como base função tirada dessa página
 * http://goo.gl/kJBK
 */
class IdadeHelper extends AppHelper {
    function calcIdade($datab) {
        $data = split("-",$datab);
        $anob = $data[0];
        $mesb = $data[1];
        $diab = $data[2];
        list ($dia,$mes,$ano) = explode("/",date("d/m/Y"));
        $idade = $ano-$anob;
        $idade = (($mes<$mesb) OR (($mes==$mesb) AND ($dia<$diab))) ? --$idade : $idade;
        return $idade;
    }
    
    function idade($datab){
    	$data = split("-",$datab);
        $anob = $data[0];
        $mesb = $data[1];
        $diab = $data[2];
        list ($dia,$mes,$ano) = explode("/",date("d/m/Y"));
        $idade = $ano-$anob;
        return $idade;
    }
}
?>