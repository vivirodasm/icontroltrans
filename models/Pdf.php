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
		$contador =-1;
		extract($datos);
		$pdf = new FPDF();
		
		$pdf->AddPage('P','Letter');
		$pdf->Image('plantillas/contrato/1.png',0,0,210,300);
		$pdf->SetFont('Arial','B',9.5);
		
		
		$pdf->Ln(16);
		$pdf->Cell(200,20,utf8_decode("FICHA TECNICA CONTRATO DE TRANSPORTE"),0,2,'C');
		$pdf->Cell(200,-10,utf8_decode("FORMATO ÚNICO DE CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL"),0,2,'C');
		$pdf->Ln(15);
		$pdf->Cell(200,-10,utf8_decode("CONTRATO N° $numContrato"),0,2,'C');
		
		
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','I',9.5);		
		//OBJETO
		$pdf->MultiCell(542,4,utf8_decode("OBJETO: EL TRANSPORTADOR de manera independiente, con plena autonomía técnica y administrativa, se compromete a 
prestar  el  servicio  de  transporte de un  grupo  de personas ocasional en los vehículos que se describen o en caso de fuerza 
mayor,  en  los  que designe  por  parte  del  operador  que  se  encuentre  en  las  mismas  condiciones  de  funcionamiento."),0,'J');
		
		$pdf->Ln(8);
		
		//CONTRATISTA 
		
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(27,5,utf8_decode("CONTRATISTA :"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(77,5,utf8_decode("$contratista"),0,0,'L');
		$pdf->SetFont('Arial','I',8);
		$pdf->Cell(13,5,utf8_decode("PLACA"),1,0,'C');
		$pdf->Cell(1,1,utf8_decode(""),0,0);
		$pdf->Cell(70,5,utf8_decode("PROPIETARIO"),1,2,'C');
		
		$pdf->Ln(1);
		//NIT
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(27,5,utf8_decode("NIT                     :"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		
		//validacion para saber cuando mostrar los datos del vehiculo
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(77,5,utf8_decode("$nitContratista"),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(77,5,utf8_decode("$nitContratista"),0,2,'L');
		}
		
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//CONTRATANTE
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(27,5,utf8_decode("CONTRATANTE:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(77,5,utf8_decode("$contratante"),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(77,5,utf8_decode("$contratante"),0,2,'L');
		}
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//IDENTIFICACIÓN
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(29,5,utf8_decode("IDENTIFICACIÓN:"));
		$pdf->SetFont('Arial','I',9.5);
		
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(75,5,utf8_decode("$identificacion"),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(75,5,utf8_decode("$identificacion"),0,2,'L');
		}
		
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//TIPO DE CONTRATO
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(35,5,utf8_decode("TIPO DE CONTRATO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(69,5,utf8_decode("$tipoContrato"),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(69,5,utf8_decode("$tipoContrato"),0,2,'L');
		}
		
		$pdf->Ln(1);
		
		//ORIGEN
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(16,5,utf8_decode("ORIGEN:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(88,5,utf8_decode("$origen"),0,0);
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(88,5,utf8_decode("$origen"),0,2);
		}
		$pdf->Ln(1);
		
		//DESTINO
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(17,5,utf8_decode("DESTINO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(87,5,utf8_decode("$destino"),0);
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(87,5,utf8_decode("$destino"),0,2);
		}
		
		
		$pdf->Ln(1);
	
		//FECHA DE INICIO 
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(31,5,utf8_decode("FECHA DE INICIO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(73,5,utf8_decode(substr($fechaInicio,0,10)),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(55,5,utf8_decode(substr($fechaInicio,0,10)),0,2,'L');
		}
		
		
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','B',9.5);
		//FECHA DE TERMINACIÓN 
		$pdf->Cell(43,5,utf8_decode("FECHA DE TERMINACIÓN:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(61,5,utf8_decode(substr($fechaTerminacion,0,10)),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(61,5,utf8_decode(substr($fechaTerminacion,0,10)),0,2,'L');
		}
		
		$pdf->Ln(1);
			
		$pdf->SetFont('Arial','B',9.5);
		//N° PASAJEROS
		$pdf->Cell(29,5,utf8_decode("N° PASAJEROS:"),0);
		$pdf->SetFont('Arial','I',9.5);
		
		if ($vehiculo = @$infoVehiculo[++$contador])
		{
			$pdf->Cell(75,5,utf8_decode("$numePasajeros"),0,0,'L');
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(13,5,utf8_decode($vehiculo['placa']),1,0);
			$pdf->Cell(1,1,utf8_decode(""),0,0);
			$pdf->Cell(70,5,utf8_decode($vehiculo['nombrecompleto']),1,2,'C');
		}
		else
		{
			$pdf->Cell(75,5,utf8_decode("$numePasajeros"),0,2,'L');
		}
		
		$pdf->Ln(1);
			
		$pdf->SetFont('Arial','B',9.5);
		//VALOR DEL CONTRATO
		$pdf->Cell(42,5,utf8_decode("VALOR DEL CONTRATO:"),0);
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(44,5,utf8_decode("$valorContrato"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//VALOR DEL CONTRATO EN LETRAS
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(33,5,utf8_decode("VALOR EN LETRAS:"),0);
		$pdf->Cell(160,5,utf8_decode("$valorContratoletras"),0,2,'L');
		
		//SALTO DE LINEA
		$pdf->Ln(1);
		
		//OBJETO DEL CONTRATO
		$pdf->SetFont('Arial','I',9.5);
		$pdf->Cell(43,5,utf8_decode("OBJETO DEL CONTRATO:"),0);
		$pdf->Cell(150,5,utf8_decode("$objetoContrato"),0,2,'L');
		
		$pdf->Ln(2);
		
		
		$pdf->Write(5,utf8_decode("CLÁUSULA PENAL: Si una de las partes incumpliese alguna de las obligaciones que por este contrato contrae, pagará a otra a título de pena una suma equivalente al diez por ciento (10%) del valor total del contrato. PARAGRAFO: Las sumas pactadas serán exigibles por la vía ejecutiva el día siguiente a aquel en que debieron cumplirse las correspondientes prestaciones, sin necesidad de requerimiento ni constitución en mora, derechos estos a los cuales renuncian ambas partes en su recíproco beneficio.

NATURALEZA JURÍDICA: Las partes dejan expresa constancia, que la naturaleza jurídica del presente contrato es de índole exclusivamente comercial y en consecuencia no genera ninguna clase de obligaciones de carácter laboral.  COMUNICACIONES O NOTIFICACIONES: Para efectos de comunicación, se tendrán en cuenta las siguientes direcciones: Para EL TRANSPORTADOR: " . $infoEmpresa['Nombre'] . ",". $infoEmpresa['Dirección'] ."  TEL: " . $infoEmpresa['Telefono'] . ",  Para EL CONTRATANTE: " . $dirContacto. " Tel:". $telContacto . "  Se suscribe en dos (02) ejemplares de un mismo tenor literal, en ". $ciudadEmpresa . " ,". $fechaContrato ." "),0,'J');

				
		$pdf->Ln(38);
		//firmas
		$pdf->Image('plantillas/contrato/2.png',140,$pdf->GetY() - 15 ,50,24);
		
		$pdf->SetFont('Arial','B',9.5);
		$pdf->Cell(40,5,utf8_decode("_____________________"),0);
		$pdf->Cell(100,5,utf8_decode(""),0);
		$pdf->Cell(40,5,utf8_decode("_____________________"),0,2,'C');
		$pdf->Ln(0);
		
		$pdf->Cell(40,5,utf8_decode("EL CONTRATANTE"),0,0,'C');
		$pdf->Cell(100,5,utf8_decode(""),0);
		$pdf->Cell(40,5,utf8_decode("EL CONTRATISTA"),0,2,'C');
		
		// 
		// $pdf->Output("contrato$numContrato.pdf",'I');
		$pdf->Output("contrato$numContrato.pdf",'F');
		return "contrato$numContrato.pdf";
		
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

		
		
		
		

?>