<?php

namespace app\models;

use Yii;

use FPDF;

require_once('../models/fpdf181/fpdf.php');

// echo "<pre>"; print_r($params); echo "</pre>"; 
// unset($_SESSION['info']);

// die;
// extract($datos);
class Pdf extends FPDF
{
	//Cabecera de página
	
	public function generarPdf(array $datos)
	{
		
		extract($datos);
		$pdf = new FPDF();
		
		$pdf->AddPage();
		$pdf->Image('plantillas/contrato/1.png',0,0,210,300);
		$pdf->SetFont('Arial','B',9.5);
		//Movernos a la derecha
		$pdf->Ln(11);
		$pdf->Cell(200,20,utf8_decode("FICHA TECNICA CONTRATO DE TRANSPORTE"),0,2,'C');
		$pdf->Cell(200,-10,utf8_decode("FORMATO ÚNICO DE CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL"),0,2,'C');
		$pdf->Ln(15);
		$pdf->Cell(200,-10,utf8_decode("CONTRATO N° $numContrato"),0,2,'C');
		
		$pdf->Ln(8);
		
		//CONTRATISTA 
		$pdf->Cell(27,5,utf8_decode("CONTRATISTA :"),0);
		$pdf->SetFont('Arial','I',9.5);
		// $pdf->Ln(10);
		$pdf->Cell(160,5,utf8_decode("$contratista"),0,2,'L');
		
		$pdf->Ln(1);
		//NIT
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(27,5,utf8_decode("NIT                     :"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(160,5,utf8_decode("$nitContratista"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		//CONTRATANTE
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(27,5,utf8_decode("CONTRATANTE:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(160,5,utf8_decode("$contratante"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//IDENTIFICACIÓN
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(29,5,utf8_decode("IDENTIFICACIÓN:"));
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(160,5,utf8_decode("$identificacion"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//TIPO DE CONTRATO
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(35,5,utf8_decode("TIPO DE CONTRATO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(160,5,utf8_decode("$tipoContrato"),0,2,'L');
		$pdf->Ln(5);
		
		
		//OBJETO
		$pdf->MultiCell(542,4,utf8_decode("OBJETO: EL TRANSPORTADOR de manera independiente, con plena autonomía técnica y administrativa, se compromete a 
prestar  el  servicio  de  transporte de un  grupo  de personas ocasional en los vehículos que se describen o en caso de fuerza 
mayor,  en  los  que designe  por  parte  del  operador  que  se  encuentre  en  las  mismas  condiciones  de  funcionamiento."),0,'J');
		$pdf->Ln(8);

		//ORIGEN
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(16,5,utf8_decode("ORIGEN:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(70,5,utf8_decode("$origen"),0,2);
		
		$pdf->Ln(1);
		
		//DESTINO
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(17,5,utf8_decode("DESTINO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(69,5,utf8_decode("$destino"),0,2);
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','B',9.5);
		//FECHA DE INICIO 
		$pdf->Cell(31,5,utf8_decode("FECHA DE INICIO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(55,5,utf8_decode(substr($fechaInicio,0,10)),0,2,'L');
		
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','B',9.5);
		//FECHA DE TERMINACIÓN 
		$pdf->Cell(43,5,utf8_decode("FECHA DE TERMINACIÓN:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(43,5,utf8_decode(substr($fechaTerminacion,0,10)),0,2,'L');
		
		
		$pdf->Ln(1);
			
		$pdf->SetFont('Arial','B',9.5);
		//N° PASAJEROS
		$pdf->Cell(29,5,utf8_decode("N° PASAJEROS:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(57,5,utf8_decode("$numePasajeros"),0,2,'L');
		
		
		$pdf->Ln(1);
			
		$pdf->SetFont('Arial','B',9.5);
		//N° PASAJEROS
		$pdf->Cell(42,5,utf8_decode("VALOR DEL CONTRATO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(44,5,utf8_decode("$valorContrato"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//VALOR EN LETRAS
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(33,5,utf8_decode("VALOR EN LETRAS:"),0);
		$pdf->Cell(160,5,utf8_decode("$valorContratoletras"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//OBJETO DEL CONTRATO
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(43,5,utf8_decode("OBJETO DEL CONTRATO:"),0);
		$pdf->Cell(150,5,utf8_decode("$objetoContrato"),0,2,'L');
		
		// vehiculos
		$pdf->Ln(2);
		$pdf->Cell(13,5,utf8_decode("PLACA"),1);
		$pdf->Cell(1,1,utf8_decode(""),0);
		$pdf->Cell(17,5,utf8_decode("LATERAL"),1);
		$pdf->Cell(1,1,utf8_decode(""),0);
		$pdf->Cell(66,5,utf8_decode("PROPIETARIO"),1,0,'C');
		
		$pdf->Cell(1,1,utf8_decode(""),0,0);
		
		//mostrar doble titulo si existe mas de 1 vehiculo
		if(count($infoVehiculo) > 1)
		{
			$pdf->Cell(13,5,utf8_decode("PLACA"),1);
			$pdf->Cell(1,1,utf8_decode(""),0);
			$pdf->Cell(17,5,utf8_decode("LATERAL"),1);
			$pdf->Cell(1,1,utf8_decode(""),0);
			$pdf->Cell(66,5,utf8_decode("PROPIETARIO"),1,1,'C');
			
		}
		else
		{
			//salto de linea para corregir error al mostrar solo 1 vehiculo
			$pdf->Ln(4);
			
		}
		
		
		$pdf->Ln(2);
		
		 
            // [idtercero] => 30312316
            // [nombrecompleto] => SEINET  SALINAS MORALES
		
		foreach ($infoVehiculo as  $key => $info)
		{
			$pdf->SetFont('Arial','I',8);
			if ($key % 2 == 0)
			{
				
				
				$pdf->Cell(13,5,utf8_decode($info['placa']),1,0);
				$pdf->Cell(1,1,utf8_decode(""),0,0);
				$pdf->Cell(17,5,utf8_decode($info['NroInterno']),1,0);
				$pdf->Cell(1,1,utf8_decode(""),0,0);
				$pdf->Cell(18,5,utf8_decode($info['idtercero']),1,0);
				$pdf->Cell(1,1,utf8_decode(""),0,0);
				$pdf->Cell(47,5,utf8_decode(substr($info['nombrecompleto'],0,28)),1,0,'C');
			}
			else
			{
				$pdf->Cell(1,1,utf8_decode(""),0);
				$pdf->Cell(13,5,utf8_decode($info['placa']),1,0);
				$pdf->Cell(1,1,utf8_decode(""),0,0);
				$pdf->Cell(17,5,utf8_decode($info['NroInterno']),1,0);
				$pdf->Cell(1,1,utf8_decode(""),0,0);
				$pdf->Cell(18,5,utf8_decode($info['idtercero']),1,0);
				$pdf->Cell(1,1,utf8_decode(""),0,0);
				$pdf->Cell(47,5,utf8_decode(substr($info['nombrecompleto'],0,28)),1,0,'C');
				
				$pdf->Ln(7);
				
			}
			// $pdf->Ln(2);
		}
		
			
		$pdf->Ln(5);
		$pdf->MultiCell(542,5,utf8_decode("
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

		$pdf->Image('plantillas/contrato/2.png',140,240,50,24);
		
		$pdf->Ln(20);
		
		//firmas
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(40,5,utf8_decode("_____________________"),0);
		$pdf->Cell(100,5,utf8_decode(""),0);
		$pdf->Cell(40,5,utf8_decode("_____________________"),0,2,'C');

		// $pdf=new PDF();
		// $pdf->Output("Contrato","D");
		$pdf->Output();
	}  //function header

	//Pie de página
	// function Footer()
	// {
		// // Posición: a 1,5 cm del final
		// $pdf->SetY(-15);
		// // Arial italic 8
		// $pdf->SetFont('Arial','I',8);
		// // Número de página
		// $pdf->Cell(0,10,'Pie de pagina',0,0,'C');
	// }
	
	// function datos($nombre $idTercero $codigo)
	// {
		
	// }
} //class

		
		
		
		// header("Content-disposition: attachment; filename=$nombreArchivo");
		// header("Content-type: MIME");
		// readfile($nombreArchivo);
		

?>