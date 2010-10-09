<?
$fpdf->cabecalho = false;
$fpdf->rodape = false;

$fpdf->Open();
$fpdf->SetFont('Arial','',7);

if (count($membros)>0) {
	$y = 0;
	$contador=0;
	$fpdf->AddFont('avantg','','avantg.php');
	foreach ($membros as $membro){
		if ($contador==0) {
			$fpdf->AddPage('P');
		}
		
		
		//$fpdf->Image('img/bg_cartao.jpg',10,$y+10,190,65);
		$fpdf->SetFont('avantg','',5);
		
		// bordas
		$fpdf->SetLineWidth(0.1);
		$fpdf->Rect(10,$y+10,190,65);
		$fpdf->Rect(80,$y+15.5,20,20);
		$fpdf->Rect(80,$y+37.5,21,8);
		
		$fpdf->Rect(14,$y+46,87,8);
		
		$fpdf->Rect(14,$y+54.5,28,8);
		$fpdf->Rect(43,$y+54.5,29,8);
		$fpdf->Rect(73,$y+54.5,28,8);
		
		$fpdf->Rect(14,$y+63,87,8);
		
		$fpdf->Rect(109,$y+31,70.5,8);
		$fpdf->Rect(181,$y+31,15,8);
		
		$fpdf->Rect(109,$y+39.5,33,8);
		$fpdf->Rect(143,$y+39.5,26,8);
		$fpdf->Rect(170,$y+39.5,26,8);
		
		$fpdf->Rect(109,$y+48.5,42.5,8);
		$fpdf->Rect(152,$y+48.5,44,8);
		
		$fpdf->Line(110.5,$y+62.5,149.5,$y+62.5);
		$fpdf->Line(153.5,$y+62.5,192.5,$y+62.5);
		
		$fpdf->Line(105,$y+10,105,$y+75);
		
		$fpdf->SetLineWidth(0.2);
		
		$fpdf->SetFont('arial','B',11);
		$fpdf->SetXY(133,$y+14.5);
		$fpdf->Cell(0,6,utf8_decode('DADOS CADASTRAIS'));
		
		$fpdf->SetFont('avantg','',5);
		$fpdf->SetXY(80,$y+36);
		$fpdf->Cell(0,6,utf8_decode('EMISSÃO'));
		$fpdf->SetXY(14,$y+45);
		$fpdf->Cell(0,6,'NOME');
		$fpdf->SetXY(14,$y+53);
		$fpdf->Cell(0,6,utf8_decode('MATRÍCULA'));
		$fpdf->SetXY(43,$y+53);
		$fpdf->Cell(0,6,'ATIVIDADE');
		$fpdf->SetXY(73,$y+53);
		$fpdf->Cell(0,6,utf8_decode('BATISMO/ÁGUA'));
		$fpdf->SetXY(14,$y+62);
		$fpdf->Cell(0,6,utf8_decode('CONGREGAÇÃO'));
		$fpdf->SetXY(108,$y+21);
		$fpdf->Cell(0,6,'PAI');
		$fpdf->SetXY(108,$y+25);
		$fpdf->Cell(0,6,utf8_decode('MÃE'));
		$fpdf->SetXY(108.5,$y+29.5);
		$fpdf->Cell(0,6,'NATURALIDADE');
		$fpdf->SetXY(180.5,$y+29.5);
		$fpdf->Cell(0,6,'SEXO');
		$fpdf->SetXY(108.5,$y+38);
		$fpdf->Cell(0,6,'NACIONALIDADE');
		$fpdf->SetXY(143,$y+38);
		$fpdf->Cell(0,6,'ESTADO CIVIL');
		$fpdf->SetXY(170,$y+38);
		$fpdf->Cell(0,6,'DATA NASCIMENTO');
		$fpdf->SetXY(108.5,$y+47);
		$fpdf->Cell(0,6,'IDENTIDADE');
		$fpdf->SetXY(152,$y+47);
		$fpdf->Cell(0,6,'CPF');		
		
		
		//dados do cartão
		
		
		if ($membro['Membro']['foto']){
			$fpdf->Image('fotos_cartao/'.$membro['Membro']["foto"],80,$y+15.5,20,20);
		}

		
		$fpdf->SetXY(80,$y+40);
		$fpdf->SetFont('avantg','',10);
		$fpdf->Cell(0,6,''.date('d/m/Y').'');
		$fpdf->SetXY(15,$y+48);
		$fpdf->Cell(0,6,utf8_decode($membro['Membro']['nome']));
		
		$fpdf->SetXY(15,$y+57);
		$fpdf->Cell(0,6,str_pad($membro['Membro']["id"],4,0,STR_PAD_LEFT));
		$fpdf->SetXY(45,$y+57);
		$fpdf->Cell(0,6,utf8_decode($membro['Funcao']["nome"]));
		
		$fpdf->SetXY(76,$y+57);
		$fpdf->Cell(0,6,$membro['Membro']["data_batismo_aguas"]);
		$fpdf->SetXY(40,$y+65);
		$fpdf->Cell(0,6,utf8_decode($membro['Congregacao']["nome"]));
		
		$fpdf->SetXY(114,$y+21);
		$fpdf->Cell(0,6,utf8_decode($membro['Membro']["nome_pai"]));
		$fpdf->SetXY(114,$y+25);
		$fpdf->Cell(0,6,utf8_decode($membro['Membro']["nome_mae"]));
		
		$fpdf->SetXY(110,$y+33);
		$fpdf->Cell(0,6,utf8_decode($membro['Cidadenascimento']["nome"].' - '.$membro['Cidadenascimento']["uf"]));
		$fpdf->SetXY(185,$y+33);
		$fpdf->Cell(0,6,''.$membro['Membro']["sexo"]);
		$fpdf->SetXY(112,$y+42);
		$fpdf->Cell(0,6,'Brasileira');
		
		$estado_civil = array('S'=>'Solteiro','C'=>'Casado','D'=>'Divorciado','V'=>'Viúvo');
		
		$fpdf->SetXY(145,$y+42);
		$fpdf->Cell(0,6,utf8_decode($estado_civil[$membro['Membro']['estado_civil']]));
		
		$fpdf->SetXY(172,$y+42);
		//$fpdf->Cell(0,6,''.substr( $membro['Membro']["data_nascimento"], 8,2 )."/".substr( $membro['Membro']["data_nascimento"], 5,2 )."/".substr( $membro['Membro']["data_nascimento"], 0,4 ).'');
		$fpdf->Cell(0,6,''.$formatacao->data($membro['Membro']["data_nascimento"]));
		$fpdf->SetXY(112,$y+51);
		$fpdf->Cell(0,6,utf8_decode($membro['Membro']["numero_rg"].' - '.$membro['Membro']['org_exp_rg']));
		$fpdf->SetXY(160,$y+51);
		$fpdf->Cell(0,6,$membro['Membro']["cpf"]);

		//ASSINATURAS
		$fpdf->SetFont('avantg','',9);
		$fpdf->SetXY(153,$y+64);
		$fpdf->Cell(40,6,utf8_decode('Augusto Claudio S Trindade'),0,0,'C');
		$fpdf->SetXY(112,$y+64);
		//$fpdf->Image('img/ass_cleosmar.gif',112,$y+54,30);
		$fpdf->Cell(40,6,utf8_decode('Pr Josue'),0,0,'C');
		
		$y+=65;
		$contador++;
		if ($contador==4){
			$contador=0;
			$y=0;
		}
	}
} else {
	$fpdf->SetFont('Arial','',15);
	$fpdf->Cell('',6,utf8_decode('Não possui cartões à imprimir'),0,0,'C');
}

echo $fpdf->fpdfOutput('cartao_'.date('YmdHis').'.pdf','D');
?>
