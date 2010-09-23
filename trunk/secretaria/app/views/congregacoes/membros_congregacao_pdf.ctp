<?
$fpdf->cabecalho_rodape = false;
$fpdf->SetFont('Arial','',7);

if(count($congregacao)>0){
	foreach($congregacao as $cong){
		$fpdf->AddPage();
		$fpdf->SetFont('Arial','B',10);
		$fpdf->SetFillColor(200,200,200);
		$fpdf->Cell('',4,utf8_decode('Congregação: '.$cong['Congregacao']['nome']),0,0,'C',1);
		$fpdf->Ln();
		
		$fpdf->SetFont('Arial','B',7);
		$w2 = array(10,90,15,10,15,15,15,15);
		$fpdf->Cell($w2[0],4,'Cod',0);
		$fpdf->Cell($w2[1],4,'Nome',0);
		$fpdf->Cell($w2[2],4,'Data Nasc',0);
		$fpdf->Cell($w2[3],4,'Idade',0,0,'C');
		$fpdf->Cell($w2[4],4,'Data Cad.',0);
		$fpdf->Cell($w2[5],4,utf8_decode('Função'),0);
		$fpdf->Cell($w2[6],4,utf8_decode('Cartão Imp'),0);
		$fpdf->Cell($w2[7],4,'Tirou foto',0);
		$fpdf->Cell('',4,'');
		
		$fpdf->Ln();
		$y=$fpdf->GetY();
		$fpdf->Line(10,$y,200,$y);
		$fpdf->SetFont('Arial','',7);
		$cor = '255';
		if(count($cong['Membro'])>0){
			foreach($cong['Membro'] as $membro){
				$fpdf->SetFillColor($cor,$cor,$cor);
				$fpdf->Cell($w2[0],4,str_pad($membro['id'],4,0,STR_PAD_LEFT),0,0,'',1);
				$fpdf->SetFont('Arial','B',7);
				$fpdf->Cell($w2[1],4,utf8_decode($membro['nome']),0,0,'',1);
				$fpdf->SetFont('Arial','',7);
				$fpdf->Cell($w2[2],4,$formatacao->data($membro['data_nascimento']),0,0,'',1);
				$fpdf->Cell($w2[3],4,$idade->calcIdade($membro['data_nascimento']),0,0,'C',1);
				$fpdf->Cell($w2[4],4,$formatacao->data($membro['created']),0,0,'',1);
				$fpdf->Cell($w2[5],4,utf8_decode($membro['Funcao']['nome']),0,0,'',1);
				$fpdf->Cell($w2[6],4,'-',0,0,'C',1);
				$fpdf->Cell($w2[7],4,utf8_decode(($membro['foto']!=''?'sim':'não')),0,0,'C',1);
				$fpdf->Cell('',4,'',0,0,'C',1);
				$cor == '255' ? $cor = '230' : $cor = '255' ;
				$fpdf->Ln();
			}
			$fpdf->Ln();
			$fpdf->SetFillColor(255,255,255);
			$y=$fpdf->GetY();
			$fpdf->Line(10,$y,200,$y);
			$fpdf->SetFont('Arial','B',7);
			$fpdf->Cell($w2[0],4,count($cong['Membro']).' membros listados');
			$fpdf->Ln(6);
		} else {
			$fpdf->Cell('',6,utf8_decode('Não possui itens à imprimir'),0,0,'C');
		}
		
	}
} else {
	$fpdf->SetFont('Arial','',15);
	$fpdf->Cell('',6,utf8_decode('Não possui itens à imprimir'),0,0,'C');
}

echo $fpdf->fpdfOutput('relatorio_'.date('YmdHis').'.pdf','D');
?>