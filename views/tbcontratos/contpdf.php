<?php

require('../vendor/fpdf181/fpdf.php');

class PDF extends FPDF
{
	//Cabecera de página
	function Header()
	{
		
		
			//---- HORIZONTAL -------
			//Logo
			
			$this->Image('plantillas/contrato/1.png',0,0,210,300);
			$this->SetFont('Arial','B',9.5);
			//Movernos a la derecha
			$this->Ln(20);
			$this->Cell(200,20,utf8_decode("FICHA TECNICA CONTRATO DE TRANSPORTE"),0,2,'C');
			$this->Cell(200,-10,utf8_decode("FORMATO ÚNICO DE CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL"),0,2,'C');
			$this->Ln(15);
			$this->Cell(200,-10,utf8_decode("CONTRATO N° 0973-2019"),0,2,'C');
			
			$this->Ln(20);
			
			//CONTRATISTA 
			$this->Cell(200,20,utf8_decode("CONTRATISTA:"));
			$this->SetFont('Arial','I',9.5);
			$this->Ln(10);
			$this->Cell(50,0,utf8_decode("REALTUR S.A"),0,2,'R');
			
			//NIT
			$this->SetFont('Arial','B',9.5);
			$this->Cell(200,10,utf8_decode("NIT:"));
			$this->SetFont('Arial','I',9.5);
			$this->Ln(10);
			$this->Cell(31,-10,utf8_decode("810.005.477-0"),0,2,'R');
			
			//SALTO DE LINEA
			$this->Ln(5);
			//CONTRATANTE
			$this->SetFont('Arial','B',9.5);
			$this->Cell(200,10,utf8_decode("CONTRATANTE:"));
			$this->SetFont('Arial','I',9.5);
			$this->Ln(10);
			$this->Cell(85,-10,utf8_decode("CARLOS ALONSO MUÑOZ MARTIN"),0,2,'R');
			
			//SALTO DE LINEA
			$this->Ln(5);
			
			//IDENTIFICACIÓN
			$this->SetFont('Arial','B',9.5);
			$this->Cell(200,10,utf8_decode("IDENTIFICACIÓN:"));
			$this->SetFont('Arial','I',9.5);
			$this->Ln(10);
			$this->Cell(53,-10,utf8_decode("810.005.477-0"),0,2,'R');
			
			//SALTO DE LINEA
			$this->Ln(5);
			
			//TIPO DE CONTRATO
			$this->SetFont('Arial','B',9.5);
			$this->Cell(200,10,utf8_decode("TIPO DE CONTRATO:"));
			$this->SetFont('Arial','I',9.5);
			$this->Ln(10);
			$this->Cell(59,-10,utf8_decode("810.005.477-0"),0,2,'R');
			

			
		
	}  //function header

	//Pie de página
	// function Footer()
	// {
		// //Posición: a 1,5 cm del final
		// $this->SetY(-15);
		// //Arial italic 8
		// $this->SetFont('Arial','I',8);
		// //Número de página
		// $this->Cell(0,10,'Pie de pagina',0,0,'C');
	// }
	
	// function datos($nombre $idTercero $codigo)
	// {
		
	// }
} //class

		//Creación del objeto de la clase heredada
		// $pdf=new PDF('L','mm','A4');
		$pdf=new PDF();
		$pdf->Output();
		
		
		// header("Content-disposition: attachment; filename=$nombreArchivo");
		// header("Content-type: MIME");
		// readfile($nombreArchivo);
		

?>