<?
App::import('Vendor', 'fpdf/fpdf');

class fpdfHelper extends FPDF {
	var $helpers = array();
	var $B;
	var $I;
	var $U;
	var $HREF;
	var $cabecalho = true;
	var $rodape = true;

	function setup ($orientation='P',$unit='mm',$format='A4') {
		$this->FPDF(null, $orientation, $unit, $format);
		$this->B=0;
	    $this->I=0;
	    $this->U=0;
	    $this->HREF='';

	}

	function WriteHTML($html)
	{
		//HTML parser
		$html=str_replace("\n",' ',$html);
		$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
		foreach($a as $i=>$e)
		{
			if($i%2==0)
			{
				//Text
				if($this->HREF)
				$this->PutLink($this->HREF,$e);
				else
				$this->Write(5,$e);
			}
			else
			{
				//Tag
				if($e[0]=='/')
				$this->CloseTag(strtoupper(substr($e,1)));
				else
				{
					//Extract attributes
					$a2=explode(' ',$e);
					$tag=strtoupper(array_shift($a2));
					$attr=array();
					foreach($a2 as $v)
					{
						if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
						$attr[strtoupper($a3[1])]=$a3[2];
					}
					$this->OpenTag($tag,$attr);
				}
			}
		}
	}

	function OpenTag($tag,$attr)
	{
		//Opening tag
		if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,true);
		if($tag=='A')
		$this->HREF=$attr['HREF'];
		if($tag=='BR')
		$this->Ln(5);
	}

	function CloseTag($tag)
	{
		//Closing tag
		if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,false);
		if($tag=='A')
		$this->HREF='';
	}

	function SetStyle($tag,$enable)
	{
		//Modify style and select corresponding font
		$this->$tag+=($enable ? 1 : -1);
		$style='';
		foreach(array('B','I','U') as $s)
		{
			if($this->$s>0)
			$style.=$s;
		}
		$this->SetFont('',$style);
	}

	function PutLink($URL,$txt)
	{
		//Put a hyperlink
		$this->SetTextColor(0,0,255);
		$this->SetStyle('U',true);
		$this->Write(5,$txt,$URL);
		$this->SetStyle('U',false);
		$this->SetTextColor(0);
	}


	function fpdfOutput ($name = 'page.pdf', $destination = 's') {
		return $this->Output($name, $destination);
	}
	
	function Header(){
		if($this->cabecalho){
			$this->Image('img/logotipo.jpg',10,7,30,20.2);
			$this->SetFont('Arial','',10);
			$this->SetX(50);$this->Cell(0,4,utf8_decode('Igreja Evangélica. Assembléia de Deus em Serranópolis'),0,0,'C');$this->Ln();
			$this->SetX(50);$this->Cell(0,4,utf8_decode('Rua Joaquim Maneco, nº 10 - Setor Centro - Serranópolis - GO'),0,0,'C');$this->Ln();
			$this->SetX(50);$this->Cell(0,4,utf8_decode('FILIADA A CADESGO E CGADB - fone 0xx64 3668-1393'),0,0,'C');$this->Ln();
			$this->Ln(6);
			$this->Ln();
			$this->Line($this->GetX(), $this->GetY(), ($this->w - $this->rMargin), $this->GetY());
		}
	}
	
	function Footer(){
		$this->SetY(-15);
		if($this->rodape){
			$this->Line($this->GetX(), $this->GetY(), ($this->w - $this->rMargin), $this->GetY());
			$this->SetFont('Arial','','9');
			$this->SetY(-10);
			$this->Cell(0,0,utf8_decode('Página '.$this->PageNo().' de '.count($this->pages)),0,0,'C');
			$this->Cell(0,0,'Impresso em: '.date('d/m/Y H:i:s'),0,0,'R');
		}
	}	
}
?>