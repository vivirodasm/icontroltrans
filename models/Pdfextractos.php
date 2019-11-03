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
		
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(22,5,utf8_decode("RAZÓN SOCIAL"),"LT",0,"L");
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(141,5,utf8_decode("$nombreEmpresa "),"T",0,"L");
		
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(10,5,utf8_decode("CC/NIT"),"T",0,"L");
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(17,5,utf8_decode("$nitEmpresa "),"TR",1,"L");
		
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(22,5,utf8_decode("CONTRATO No."),"LT",0,"L");
		
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(141,5,utf8_decode("$nroContrato"),"T",0,"L");
		
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(10,5,utf8_decode("R.T.N."),"T",0,"L");
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(17,5,utf8_decode("$rtn"),"TR",1,"L");
		
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(23,10,utf8_decode(" CONTRATANTE"),"TL",0,"C");
		
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(140,10,utf8_decode("$nombreContratante "),"T",0,"L");
		
		$pdf->SetFont("Arial","B",8);
		$pdf->Cell(10,10,utf8_decode("CC/NIT "),"T",0,"L");
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(17,10,utf8_decode("$nitContratante"),"TR",1,"L");
		
		
		$pdf->SetFont("Arial","",6);
		$pdf->MultiCell(190,5,utf8_decode("OBJETO DEL CONTRATO:". str_pad($objetoContrato,1000) ),1,"J", 0);

		$pdf->SetFont("Arial","B",6);
		$pdf->Cell(15,3,utf8_decode("ORIGEN"),"TL",0,"L");
		
		$pdf->SetFont("Arial","",6);
		$pdf->Cell(80,3,utf8_decode("$ciudadOrigen "),0,0,"L");
		
		
		
		$pdf->SetFont("Arial","B",6);
		$pdf->Cell(15,3,utf8_decode("DESTINO"),0,0,"L");
		$pdf->SetFont("Arial","",6);
		$pdf->Cell(80,3,utf8_decode("$ciudadDestino"),"R",1,"L");
		

		$pdf->Cell(15,5,utf8_decode(""),"L",0,"L");
		$pdf->Cell(80,5,utf8_decode("$departamentoOrigen  "),0,0,"L");
		$pdf->Cell(15,5,utf8_decode(""),0,0,"L");
		$pdf->Cell(80,5,utf8_decode("$departamentoDestino "),"R",1,"L");
		
		$pdf->Cell(190,5,utf8_decode(""),"LR",1,"L");
		
		$pdf->SetFont("Arial","",6);
		$pdf->MultiCell(190,5,utf8_decode("RECORRIDO: ".str_pad(utf8_decode($recorrido),759," ",STR_PAD_RIGHT) ),1,"J", 0);
		
		$pdf->SetFont("Arial","B",7);
		$pdf->MultiCell(190,4,utf8_decode("TIPO DE CONTRATO : $tipoContrato
CONVENIO EMPRESARIAL: $convenioEmp"),1,"J", 0);
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(190,5,utf8_decode("VIGENCIA DEL CONTRATO"),1,1,"C");
		
		$espacio = 41;
		$fechadeinicio = explode("-",$fechaInicio);
		$pdf->Cell(45,5,utf8_decode("FECHA DE INICIO"),"L",0,"L");
		$pdf->Cell(7,5,utf8_decode("DIA:"),0,0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell($espacio,5,utf8_decode("$fechadeinicio[2]"),0,0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(8,5,utf8_decode("MES:"),0,0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell($espacio,5,utf8_decode("$fechadeinicio[1]"),0,0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(7,5,utf8_decode("AÑO:"),0,0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell($espacio,5,utf8_decode("$fechadeinicio[0]"),"R",1,"L");
		
		$pdf->SetFont("Arial","B",7);
		$fechadevencimiento = explode("-",$fechaFin);
		
		$fechadeinicio = explode("-",$fechaInicio);
		$pdf->Cell(45,5,utf8_decode("FECHA DE VENCIMIENTO"),"LT",0,"L");
		$pdf->Cell(7,5,utf8_decode("DIA:"),"T",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell($espacio,5,utf8_decode("$fechadevencimiento[2]"),"T",0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(8,5,utf8_decode("MES:"),"T",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell($espacio,5,utf8_decode("$fechadevencimiento[1]"),"T",0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(7,5,utf8_decode("AÑO:"),"T",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell($espacio,5,utf8_decode("$fechadevencimiento[0]"),"TR",1,"L");
		
		$pdf->SetFont("Arial","B",7);
		
		$pdf->Cell(190,5,utf8_decode("DATOS DEL VEHICULO"),1,1,"C");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(33.5,5,utf8_decode("PLACA"),"L",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(14,5,utf8_decode("$placa"),"R",0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(33.5,5,utf8_decode("Nro"),0,0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(14,5,utf8_decode("$interno"),"R",0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(33.5,5,utf8_decode("MODELO"),0,0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(14,5,utf8_decode("$modelo"),"R",0,"L");
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(20.5,5,utf8_decode("MARCA"),0,0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(27,5,utf8_decode("$marca"),"R",1,"L");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(47.5,5,utf8_decode("CLASE DE VEHICULO "),"LT",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(47.5,5,utf8_decode("$clase "),"T",0,"L");
		
		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(47.5,5,utf8_decode("Nro TARJETA OPERACIÓN"),"LT",0,"L");
		$pdf->SetFont("Arial","",7);
		$pdf->Cell(47.5,5,utf8_decode("$nroTarjeta "),"TR",1,"L");
		
		
		
		
		
		$pdf->Cell(190,5,utf8_decode("DATOS DEL CONDUCTOR "),1,1,"C");
		
		$pdf->SetFont("Arial","",7);
		for($i=0;$i<7;$i++)
		{
			$pdf->Cell(55,5,utf8_decode( @$conductores[$i]['nombre'] ),1,0,"C");
			$pdf->Cell(40,5,utf8_decode( @$conductores[$i]['cc'] ),1,0,"C");
			$pdf->Cell(55,5,utf8_decode( @$conductores[$i]['nroLicencia'] ),1,0,"C");
			$pdf->Cell(40,5,utf8_decode( @$conductores[$i]['vigLicencia'] ),1,1,"C");
			
		}
		

		$pdf->SetFont("Arial","B",7);
		$pdf->Cell(55,5,utf8_decode("RESPONSABLE DEL CONTRATO"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("CEDULA"),1,0,"C");
		$pdf->Cell(55,5,utf8_decode("DIRECCION"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("TELEFONO"),1,1,"C");
		
		
		$pdf->SetFont("Arial","",8);
		$pdf->Cell(55,5,utf8_decode("$responsableContrato"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("$cedula"),1,0,"C");
		$pdf->Cell(55,5,utf8_decode("$direccion"),1,0,"C");
		$pdf->Cell(40,5,utf8_decode("$telefono"),1,1,"C");
		
		$pdf->SetFont("Arial","",9);
		$pdf->MultiCell(120,3,utf8_decode("
$direccionEmpresa "),"LR","J", 0);
		
		$pdf->SetFont("Arial","",20);
		$pdf->Cell(120,25,utf8_decode($FUEC),"LBR",1,"L");
 
		$pdf->SetXY($pdf->GetX() + 120,$pdf->GetY() - 37 );
 
		$pdf->SetFont("Arial","",5);
		$pdf->MultiCell(70,4.628,utf8_decode("
		
		
		
		Firma electrónica Ley 527/1999 - Decreto 2364/2012 
		_____________________________________________
		FIRMA Y SELLO DE LA EMPRESA 
		Fecha Elaboración: 10/05/2019 12:26:30 p. m."),1,"C", 0);
		
		$pdf->SetFont("Arial","",6);
		$pdf->Cell(80,3,utf8_decode("i-Control-Trans - - H&S Soluciones Tecnológicas - www.hyssolucionestecnologicas.com"),0);
		
		
		
		//imagen vigilado super transporte
		$pdf->Image("plantillas/extracto/supertransporte2.jpg",$pdf->GetX() + 29,$pdf->GetY() - 33,10,30);
		
		//firma		
		$pdf->Image("images/extractos/$nitEmpresa/firma.png",$pdf->GetX() + 43,$pdf->GetY() - 30,50,24);

		
		// $pdf->Output("Contrato","D");

		// $pdf->Output("ExtractoContrato$nroContrato.pdf",'I');
		$pdf->Output("$FUEC.pdf",'F');
		return "$FUEC.pdf";
		
		
	}  //function header

	
} //class

		
?>