<?php

namespace app\models;

use Yii;

use FPDF;

require_once("../models/fpdf181/fpdf.php");


class Pdfextractos extends FPDF
{
	
	
	//Cabecera de página
	
	public function generarPdf(array $datos)
	{
		$contador =-1;
		extract($datos);
		$pdf = new FPDF();
		
		$pdf->AddPage("P","Letter");
		$pdf->Image("plantillas/extracto/marca_agua.jpg",0,0,210,300);
		$pdf->Image("plantillas/extracto/mintransporte.jpg",14,24,85,15);
		$pdf->SetFont("Arial","B",9.5);
		
	  
	  
		$pdf->Ln(4);
		$pdf->Cell(190,5,utf8_decode('FICHA TECNICA DEL FORMATO UNICO DEL EXTRACTO DEL CONTRATO "FUEC"'),1,1,"C");
		
		$pdf->Cell(95,25,utf8_decode(""),1,0,"C");
		$pdf->Cell(95,25,utf8_decode('DEL EXTRACTO DEL CONTRATO "FUEC" '),1,1,"C");
		
		$pdf->SetFont("Arial","B",9.3);
		$pdf->Cell(190,5,utf8_decode("FORMATO ÚNICO DE EXTRACTO DEL CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE"),"LR", 1,"C");
		
		$pdf->SetFont("Arial","B",9.3);
		$pdf->Cell(190,5,utf8_decode("AUTOMOTOR ESPECIAL"),"LR", 1,"C");
		
		$pdf->SetFont("Arial","B",15);
		$pdf->Cell(190,5,utf8_decode("FUEC No. $FUEC"),"LR", 1,"C");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(20,5,utf8_decode("RAZÓN SOCIAL"),"LT",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(145,5,utf8_decode("$nombreEmpresa "),"T",0,"L");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(9,5,utf8_decode("CC/NIT"),"T",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(16,5,utf8_decode("$nitEmpresa "),"TR",1,"L");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(20,5,utf8_decode("CONTRATO No."),"LT",0,"L");
		
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(145,5,utf8_decode("$nroContrato"),"T",0,"L");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(9,5,utf8_decode("R.T.N."),"T",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(16,5,utf8_decode("$rtn"),"TR",1,"L");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(190,5,utf8_decode("CONTRATO No. $nroContrato   R.T.N. $rtn "),1,1,"C");
		$pdf->Cell(190,10,utf8_decode("CONTRATANTE $nombreContratante    CC/NIT $nitContratante  "),1,1,"C");
		
		
		$pdf->SetFont("Arial","",6);
		$pdf->MultiCell(190,5,utf8_decode("OBJETO DEL CONTRATO: $objetoContrato "),1,"J", 0);

		$pdf->Cell(190,15,utf8_decode("ORIGEN $departamentoOrigen $ciudadOrigen  DESTINO  $departamentoDestino  $ciudadDestino "),1,1,"C");
		
		$pdf->SetFont("Arial","",6);
		$pdf->MultiCell(190,5,utf8_decode("RECORRIDO:  $recorrido"),1,"J", 0);
		
		$pdf->SetFont("Arial","B",7);
		$pdf->MultiCell(190,4,utf8_decode("TIPO DE CONTRATO : $tipoContrato
	CONVENIO EMPRESARIAL: $convenioEmp"),1,"J", 0);
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(190,5,utf8_decode("VIGENCIA DEL CONTRATO"),1,1,"C");
		
		$fechadeinicio = explode("-",$fechaInicio);
		$pdf->Cell(190,5,utf8_decode("FECHA DE INICIO DIA:$fechadeinicio[2]  MES:$fechadeinicio[1]  AÑO: $fechadeinicio[0]"),1,1,"J");
		
		$fechadevencimiento = explode("-",$fechaFin);
		$pdf->Cell(190,5,utf8_decode("FECHA DE VENCIMIENTO DIA:$fechadevencimiento[2]  MES:$fechadevencimiento[1]  AÑO:$fechadevencimiento[0]"),1,1,"J");
		
		$pdf->Cell(190,5,utf8_decode("DATOS DEL VEHICULO"),1,1,"C");
		
		$pdf->Cell(47.5,5,utf8_decode("PLACA $placa "),1,0,"C");
		$pdf->Cell(47.5,5,utf8_decode("Nro $interno "),1,0,"C");
		$pdf->Cell(47.5,5,utf8_decode("MODELO $modelo "),1,0,"C");
		$pdf->Cell(47.5,5,utf8_decode("MARCA $marca "),1,1,"C");
		
		$pdf->Cell(95,5,utf8_decode("CLASE DE VEHICULO $clase "),1,0,"C");
		$pdf->Cell(95,5,utf8_decode("Nro TARJETA OPERACIÓN $nroTarjeta "),1,1,"C");
		
		$pdf->Cell(190,5,utf8_decode("DATOS DEL CONDUCTOR "),1,1,"C");
		
		
		for($i=0;$i<7;$i++)
		{
			$pdf->Cell(55,5,utf8_decode( @$conductores[$i]['nombre'] ),1,0,"C");
			$pdf->Cell(40,5,utf8_decode( @$conductores[$i]['cc'] ),1,0,"C");
			$pdf->Cell(55,5,utf8_decode( @$conductores[$i]['nroLicencia'] ),1,0,"C");
			$pdf->Cell(40,5,utf8_decode( @$conductores[$i]['vigLicencia'] ),1,1,"C");
			
		}
		

		
		$pdf->Cell(55,5,utf8_decode("RESPONSABLE DEL CONTRATO"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("CEDULA"),1,0,"C");
		$pdf->Cell(55,5,utf8_decode("DIRECCION"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("TELEFONO"),1,1,"C");
		
		$pdf->Cell(55,5,utf8_decode("$responsableContrato"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("$cedula"),1,0,"C");
		$pdf->Cell(55,5,utf8_decode("$direccion"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("$telefono"),1,1,"C");
		
		
		$pdf->MultiCell(120,7,str_pad(utf8_decode("$direccionEmpresa"), 500),1,"J", 0);
 
		$pdf->SetXY($pdf->GetX() + 120,$pdf->GetY() - 28 );
 
		$pdf->SetFont("Arial","",5);
		$pdf->MultiCell(70,3.1,utf8_decode("
		
		
		
		
		Firma electrónica Ley 527/1999 - Decreto 2364/2012 
		_____________________________________________
		FIRMA Y SELLO DE LA EMPRESA 
		Fecha Elaboración: 10/05/2019 12:26:30 p. m."),1,"C", 0);
		
		$pdf->SetFont("Arial","",6);
		$pdf->Cell(80,5,utf8_decode("-Control-Trans - - H&S Soluciones Tecnológicas - www.hyssolucionestecnologicas.com"),0);
		

		
		// $pdf->Output("Contrato","D");
		$pdf->Output("ExtractoContrato.pdf","I");
	}  //function header

	
} //class

		
?>