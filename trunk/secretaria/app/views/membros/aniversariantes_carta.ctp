<?
$fpdf->cabecalho = false;
$fpdf->rodape = false;
$fpdf->AddFont('monotype','','monotype.php');
$fpdf->AddFont('avantg','','avantg.php');
$fpdf->Open();
if (count($membros)>0) {
	foreach($membros as $membro){
		$fpdf->AddPage();
		$fpdf->SetTopMargin(20);
		$fpdf->SetLeftMargin(25);
		$fpdf->SetRightMargin(15);
		$fpdf->Image('img/logotipo.jpg',10,20,30,20.2);
		$fpdf->Image('img/logotipo2.jpg',55,80,110,73.8);
		$fpdf->SetFont('Arial','B',12);
		$fpdf->SetXY(40,20);
		$fpdf->Cell(0,6,utf8_decode('IGREJA EV. ASSEMBLÉIA DE DEUS EM SERRANÓPOLIS'),0,0,'C');
		$fpdf->Ln(4);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetX(40);
		$fpdf->Cell(0,6,utf8_decode('Rua Joaquim Maneco, nº 10 - Setor Centro - Serranópolis - GO'),0,0,'C');
		$fpdf->Ln(4);
		$fpdf->SetX(40);
		$fpdf->Cell(0,6,'FILIADA A CADESGO E CGADB - fone 0xx64 3668-1393',0,0,'C');
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Cell(0,6,utf8_decode('SAUDAÇÕES NO SENHOR'),0,0,'C');
		$fpdf->Ln(4);
		$fpdf->SetTextColor(255,0,0);
		$fpdf->Cell(0,6,'Filipenses 1:3',0,0,'C');
		$fpdf->SetTextColor(0,0,0);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->Ln(4);
		$fpdf->SetFont('Arial','',14);
		$fpdf->MultiCell(0,9,utf8_decode('        Prezad'.($membro['Membro']['sexo']=='M' ? 'o' : 'a').' irmã'.($membro['Membro']['sexo']=='M' ? 'o' : '').' '.$membro['Membro']['nome'].' é com muita alegria que venho através desta parabenizá-lo pelo seu aniversário que ocorrerá no dia '.substr( $membro['Membro']["data_nascimento"], 8,2 ).'/'.substr( $membro['Membro']["data_nascimento"], 5,2 ).'/'.date('Y').'.'));
		$fpdf->MultiCell(0,9,utf8_decode('        O nosso desejo é que o Senhor alargue os seus dias na face da terra e que todos os seus sonhos sejam realizados estando eles debaixo da vontade de Deus.'));
		$fpdf->MultiCell(0,9,utf8_decode('        Que através de você toda sua família seja abençoada, guardada e guiada pelas mãos do nosso Deus.'));
		$fpdf->MultiCell(0,9,utf8_decode('        Sem mais termino esta saudando-'.($membro['Membro']['sexo']=='M' ? 'o' : 'a').' com a seguinte leitura bíblica.'));
		$fpdf->SetTextColor(255,0,0);
		$fpdf->MultiCell(0,9,utf8_decode('        "O Senhor te abençoe e te guarde,o Senhor faça resplandecer o  rosto sobre ti e tenha misericórdia de ti, o Senhor sobre ti levante o rosto e te dê a paz Num.6:24ao26."'));
		$fpdf->SetTextColor(0,0,0);
		$fpdf->MultiCell(0,9,utf8_decode('        São os sinceros votos do seu servo, companheiro, amigo, irmão e pastor que muito '.($membro['Membro']['sexo']=='M' ? 'o' : 'a').' considera.'));
		$fpdf->Ln(6);
		$fpdf->Cell(0,6,'        Fraternalmente em Cristo');
		$fpdf->Ln(6);
		$fpdf->Ln(6);
		$fpdf->Ln(6);
		$fpdf->Ln(6);
		$fpdf->Ln(6);
		$fpdf->Ln(6);
		$fpdf->SetFont('Arial','B',12);
		$fpdf->Cell(0,6,'Pr. Cleosmar de Almeida',0,0,'C');
		$fpdf->Ln(4);
		$fpdf->SetFont('monotype','',12);
		$fpdf->Cell(0,6,'Pr. Presidente',0,0,'C');
		$fpdf->Ln(4);
	}
} else {
	$fpdf->SetFont('Arial','',15);
	$fpdf->Cell('',6,utf8_decode('Não possui cartões à imprimir'),0,0,'C');
}

echo $fpdf->fpdfOutput('aniversarios_'.date('YmdHis').'.pdf','D');
?>