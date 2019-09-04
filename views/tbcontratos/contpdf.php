<?php

require_once('../vendor/fpdf181/fpdf.php');

// echo "<pre>"; print_r($params); echo "</pre>"; 
// unset($_SESSION['info']);
// echo "<pre>"; print_r($_SESSION); echo "</pre>"; 
// die;
// extract($datos);
class PDF extends FPDF
{
	//Cabecera de página
	function Header()
	{
			//imagen de fondo
			$this->Image('plantillas/contrato/1.png',0,0,210,300);
			$this->SetFont('Arial','B',9.5);
			//Movernos a la derecha
			$this->Ln(20);
			$this->Cell(200,20,utf8_decode("FICHA TECNICA CONTRATO DE TRANSPORTE"),0,2,'C');
			$this->Cell(200,-10,utf8_decode("FORMATO ÚNICO DE CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL"),0,2,'C');
			$this->Ln(15);
			$this->Cell(200,-10,utf8_decode("CONTRATO N° contrato"),0,2,'C');
			
			$this->Ln(20);
			
			//CONTRATISTA 
			$this->Cell(27,5,utf8_decode("CONTRATISTA :"),0);
			$this->SetFont('Arial','I',9.5);
			// $this->Ln(10);
			$this->Cell(160,5,utf8_decode("REAL"),0,2,'L');
			
			$this->Ln(1);
			//NIT
			$this->SetFont('Arial','B',9.5);
			$this->Cell(27,5,utf8_decode("NIT                     :"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(160,5,utf8_decode("810.005.477-0"),0,2,'L');
			
			//SALTO DE LINEA
			$this->Ln(1);
			//CONTRATANTE
			$this->SetFont('Arial','B',9.5);
			$this->Cell(27,5,utf8_decode("CONTRATANTE:"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(160,5,utf8_decode("CARLOS ALONSO MUÑOZ MARTIN"),0,2,'L');
			
			//SALTO DE LINEA
			$this->Ln(1);
			
			//IDENTIFICACIÓN
			$this->SetFont('Arial','B',9.5);
			$this->Cell(29,5,utf8_decode("IDENTIFICACIÓN:"));
			$this->SetFont('Arial','I',9.5);
			$this->Cell(160,5,utf8_decode("810.005.477-0"),0,2,'L');
			
			//SALTO DE LINEA
			$this->Ln(1);
			
			//TIPO DE CONTRATO
			$this->SetFont('Arial','B',9.5);
			$this->Cell(35,5,utf8_decode("TIPO DE CONTRATO:"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(160,5,utf8_decode("810.005.477-0"),0,2,'L');
			$this->Ln(11);
			
			$this->MultiCell(542,4,utf8_decode("OBJETO: EL TRANSPORTADOR de manera independiente, con plena autonomía técnica y administrativa, se compromete a 
prestar  el  servicio  de  transporte de un  grupo  de personas ocasional en los vehículos que se describen o en caso de fuerza 
mayor,  en  los  que designe  por  parte  del  operador  que  se  encuentre  en  las  mismas  condiciones  de  funcionamiento."),0,'J');
			$this->Ln(10);

			//ORIGEN
			$this->SetFont('Arial','B',9.5);
			$this->Cell(16,5,utf8_decode("ORIGEN:"),0);
			
			$this->Ln(1);
			
			
			$this->Ln(1);
			
			//DESTINO
			$this->SetFont('Arial','B',9.5);
			$this->Cell(17,5,utf8_decode("DESTINO:"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(69,5,utf8_decode("MANIZALES - CALDAS:"),0);
			$this->SetFont('Arial','I',8);
			$this->Cell(13,5,utf8_decode("ZNK-661"),1);
			$this->Cell(1,1,utf8_decode(""),0);
			$this->Cell(17,5,utf8_decode("1234"),1);
			$this->Cell(1,1,utf8_decode(""),0);
			$this->Cell(70,5,utf8_decode("Juan Rios"),1,2,'C');
			
			$this->Ln(1);
			$this->SetFont('Arial','B',9.5);
			//FECHA DE INICIO 
			$this->Cell(31,5,utf8_decode("FECHA DE INICIO:"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(55,5,utf8_decode("2019-00-00"),0,0,'L');
			$this->SetFont('Arial','I',8);
			$this->Cell(13,5,utf8_decode("ZNK-661"),1,0);
			$this->Cell(1,1,utf8_decode(""),0,0);
			$this->Cell(17,5,utf8_decode("1234"),1,0);
			$this->Cell(1,1,utf8_decode(""),0,0);
			$this->Cell(70,5,utf8_decode("Juan Rios"),1,2,'C');
			
			$this->Ln(1);
			
			$this->SetFont('Arial','B',9.5);
			//FECHA DE TERMINACIÓN 
			$this->Cell(43,5,utf8_decode("FECHA DE TERMINACIÓN:"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(43,5,utf8_decode("2019-00-00"),0,0,'L');
			$this->SetFont('Arial','I',8);
			$this->Cell(13,5,utf8_decode("ZNK-661"),1,0);
			$this->Cell(1,1,utf8_decode(""),0,0);
			$this->Cell(17,5,utf8_decode("1234"),1,0);
			$this->Cell(1,1,utf8_decode(""),0,0);
			$this->Cell(70,5,utf8_decode("Juan Rios"),1,2,'C');
			
				$this->Ln(1);
			
			$this->SetFont('Arial','B',9.5);
			//N° PASAJEROS
			$this->Cell(31,5,utf8_decode("N° PASAJEROS:"),0);
			$this->SetFont('Arial','I',9.5);
			$this->Cell(55,5,utf8_decode("2019-00-00"),0,0,'L');
			$this->SetFont('Arial','I',8);
			$this->Cell(13,5,utf8_decode("ZNK-661"),1,0);
			$this->Cell(1,1,utf8_decode(""),0,0);
			$this->Cell(17,5,utf8_decode("1234"),1,0);
			$this->Cell(1,1,utf8_decode(""),0,0);
			$this->Cell(70,5,utf8_decode("Juan Rios"),1,2,'C');
			
			
			//SALTO DE LINEA
			$this->Ln(1);
			
			//VALOR EN LETRAS
			$this->SetFont('Arial','B',9.5);
			$this->Cell(33,5,utf8_decode("VALOR EN LETRAS:"),0);
			$this->Cell(160,5,utf8_decode("TRESCIENTOS SETENTA YOCHO MIL PESOS M/CTE"),0,2,'L');
			
			//SALTO DE LINEA
			$this->Ln(1);
			
			//OBJETO DEL CONTRATO
			$this->SetFont('Arial','I',9.5);
			$this->Cell(43,5,utf8_decode("OBJETO DEL CONTRATO:"),0);
			$this->Cell(150,5,utf8_decode("810.005.477-0"),0,2,'L');
			
			$this->Ln(2);
		
			$this->SetFont('Arial','I',9.5);
			$this->Cell(70,5,utf8_decode("MANIZALES - CALDAS:"),0);
			$this->Cell(13,5,utf8_decode("PLACA"),1);
			$this->Cell(1,1,utf8_decode(""),0);
			$this->Cell(17,5,utf8_decode("LATERAL"),1);
			$this->Cell(1,1,utf8_decode(""),0);
			$this->Cell(70,5,utf8_decode("PROPIETARIO"),1,2,'C');
		
		
		$this->MultiCell(542,5,utf8_decode("
CLÁUSULA PENAL: Si una de las partes incumpliese alguna de las obligaciones que por este contrato contrae, pagará a otra a 
título de pena una suma equivalente al diez por ciento (10%) del valor total del contrato. PARAGRAFO: Las sumas pactadas serán 
exigibles por la vía ejecutiva el día siguiente a aquel en que debieron cumplirse las correspondientes prestaciones, sin necesidad 
de requerimiento ni constitución en mora, derechos estos a los cuales renuncian ambas partes en su recíproco beneficio.

NATURALEZA JURÍDICA: Las partes dejan expresa constancia, que la naturaleza jurídica del presente contrato es de índole
exclusivamente comercial y en consecuencia no genera ninguna clase de obligaciones de carácter laboral. 
COMUNICACIONES O NOTIFICACIONES: Para efectos de comunicación, se tendrán en cuenta las siguientes direcciones: 
Para EL TRANSPORTADOR: REALTUR S.A, AV. PANAMERICANA - ESTACIÓN URIBE - LOTE EL CAMPIN, Tel: (6)893-1410 - 
(6)893-1411 - (6)893-1412, Para EL CONTRATANTE: CRA 17 Nª51C-04 Tel: 3118928325Se suscribe en dos (02) ejemplares 
de un mismo tenor literal, en Manizales, en junio 08, 2019 "),0,'J');




			$this->Image('plantillas/contrato/2.png',140,240,50,24);
			
			$this->Ln(20);
			
			//firmas
			$this->SetFont('Arial','B',9.5);
			$this->Cell(40,5,utf8_decode("_____________________"),0);
			$this->Cell(100,5,utf8_decode(""),0);
			$this->Cell(40,5,utf8_decode("_____________________"),0,2,'C');


	}  //function header

	//Pie de página
	// function Footer()
	// {
		// // Posición: a 1,5 cm del final
		// $this->SetY(-15);
		// // Arial italic 8
		// $this->SetFont('Arial','I',8);
		// // Número de página
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