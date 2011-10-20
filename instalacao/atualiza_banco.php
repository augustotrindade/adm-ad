<?
function parse_mysql_dump($url) {
    $handle = @fopen($url, "r");
	$query = "";
    while(!feof($handle)) {
		$sql_line = fgets($handle);
        if (trim($sql_line) != "" && strpos($sql_line, "--") === false) {
			$query .= $sql_line;
            if (preg_match("/;[\040]*\$/", $sql_line)) {
                $result = mysql_query($query) or die(mysql_error());
                $query = "";
            }
        }
    }
}

$host = 'localhost';
$username = 'root';
$password = 'vacalouca';
$database = 'sistema';
$arquivo = 'sistema.sql';

$con = @mysql_connect($host,$username,$password);
if (!$con) {
    die('Não foi possível conectar: ' . mysql_error());
}

$conn = @mysql_select_db($database,$con);
if (!$conn) {
	$rs = mysql_query("CREATE DATABASE $database");
	if(!$rs){
		die("Não foi possivel criar o Banco de Dados '$database'");
	}
	$conn = @mysql_select_db($database,$con);
}

parse_mysql_dump($arquivo);
?>
Atualização realizada com sucesso! <br />
<a href="http://localhost/adm-ad/desktop/usuarios/login">Voltar ao sistema</a>
