$( document ).ready(function() 
{


});


$("#tbextractos-nrocontrato").change(function() 
{
	filtro = $(this).val();
	$.get( 'index.php?r=tbextractos/info-contrato&nroContrato='+filtro,
			function( data )
			{
				
								
				//responsable contrato 
				$("#tbextractos-resp_contrato").val(data.resp_Contrato);
				//cedula contacto 
				$("#tbextractos-cedresp_contrato").val(data.cedResp_Contrato);
				//direccion contacto 
				$("#tbextractos-dirresp_contrato").val(data.dirResp_Contrato);
				// telefono contacto
				$("#tbextractos-telresp_contrato").val(data.telResp_Contrato);
				//fecha inicio contrato 
				$("#tbextractos-fechainicio").val(data.fechaInicio.substr(0, 10));
				//fecha fin contrato 
				$("#tbextractos-fechafin").val(data.fechaFin.substr(0, 10));
				//ciudad origen contrato 
				$("#tbextractos-ciudadorigen").val(data.ciudadOrigen);
				//ciudad deestino contrato
				$("#tbextractos-ciudaddestino").val(data.ciudadDestino);
				//tipoContrato
				$("#tbextractos-tipocontrato").val(data.tipoContrato);
				
				
			},'json'
				);
	
});


$("#tbextractos-idvehiculo").change(function() 
{
	filtro = $(this).val();
	$.get( 'index.php?r=tbextractos/doc-vehiculos&placa='+filtro,
			function( data )
			{
				stilo ="background-color:  #a93226;  color: white; border-radius: 5px;";
				
				vehvtoto = $("#tbextractos-vehvtoto");
				vehvtoextintor = $("#tbextractos-vehvtoextintor");
				vehvtocda = $("#tbextractos-vehvtocda");
				vehvtosoat = $("#tbextractos-vehvtosoat");
				vehvtorcc = $("#tbextractos-vehvtorcc");
				vehvtorce = $("#tbextractos-vehvtorce");
				
				
				vehvtoto.attr("style","");
				vehvtoextintor.attr("style","");
				vehvtocda.attr("style","");
				vehvtosoat.attr("style","");
				vehvtorcc.attr("style","");
				vehvtorce.attr("style","");
					
				//TO
				if (data.fechaVtoTO.fecha.substr(10) == "vencido"|| data.fechaVtoTO.fecha.substr(0,8) == "no posee") 
				{
					vehvtoto.attr("style",stilo);
					vehvtoto.val(data.fechaVtoTO.fecha.substr(0,10));
				}
				else
				{
					vehvtoto.val(data.fechaVtoTO.fecha);
				}
				
				//extintor
				if (data.fechaVtoExtintor.fecha.substr(10) == "vencido"  || data.fechaVtoExtintor.fecha.substr(0,8) == "no posee") 
				{
					vehvtoextintor.attr("style",stilo);
					vehvtoextintor.val(data.fechaVtoExtintor.fecha.substr(0,10));
					
				}
				else
				{
					vehvtoextintor.val(data.fechaVtoExtintor.fecha);
				}
					
				//CDA
				if (data.fechaVtoCDA.fecha.substr(10) == "vencido" || data.fechaVtoCDA.fecha.substr(0,8) == "no posee")
				{
					
					vehvtocda.attr("style",stilo);
					vehvtocda.val(data.fechaVtoCDA.fecha.substr(0,10));
				}
				else
				{
					vehvtocda.val(data.fechaVtoCDA.fecha);
				}
				
				
				//SOAT
				if (data.fechaVtoSOAT.fecha.substr(10) == "vencido"   || data.fechaVtoSOAT.fecha.substr(0,8) == "no posee")
				{
					vehvtosoat.attr("style",stilo);
					vehvtosoat.val(data.fechaVtoSOAT.fecha.substr(0,10));
				}
				else
				{
					vehvtosoat.val(data.fechaVtoSOAT.fecha);
				}
				
				//RCC
				if (data.fechaVtoRCC.fecha.substr(10) == "vencido" || data.fechaVtoRCC.fecha.substr(0,8) == "no posee")  
				{
					vehvtorcc.attr("style",stilo);
					vehvtorcc.val(data.fechaVtoRCC.fecha.substr(0,10));
				}
				else
				{
					vehvtorcc.val(data.fechaVtoRCC.fecha);
				}
				
				//RCE
				if (data.fechaVtoRCE.fecha.substr(10) == "vencido" || data.fechaVtoRCE.fecha.substr(0,8) == "no posee") 
				{
					vehvtorce.attr("style",stilo);
					vehvtorce.val(data.fechaVtoRCE.fecha.substr(0,10));
				}
				else
				{
					vehvtorce.val(data.fechaVtoRCE.fecha);
				}
				
				
				$("#tbextractos-vehvtobimestral").val(data.fechaVtoRPbimest);
				
				estadoDoc = "";
				$.each(data.estadoDocumentos, function (index, value) 
				{
					// alert(value);
					estadoDoc = estadoDoc + value +"<br>";

				});
				// alert(estadoDoc);
				Swal.fire(
				{
				  title: ''+ estadoDoc,
				  type: 'info',
				  focusConfirm: false,
				  confirmButtonText:
					'aceptar'
				  
				});

			},'json'
				);
	
});

$("#btnTercero,#btnConTercero ").click(function() 
{
	// alert();
	idtercero = $("#tbextractos-idtercero").val();
	if (idtercero == null)
	{
		Swal.fire(
			{
			  title: 'Seleccione un tercero',
			  type: 'info',
			  focusConfirm: false,
			  confirmButtonText:
				'aceptar'
			  
			})
	}
	else
	{
		$.get( 'index.php?r=tbextractos/info-responsable&idtercero='+idtercero+"&btn="+$(this).attr("id"),
		function( data )
		{
									
			//responsable contrato 
			$("#tbextractos-resp_contrato").val(data.nombre);
			//cedula contacto 
			$("#tbextractos-cedresp_contrato").val(data.identificacion);
			//direccion contacto 
			$("#tbextractos-dirresp_contrato").val(data.direccion);
			// telefono contacto
			$("#tbextractos-telresp_contrato").val(data.movil);
			
			
		},'json'
			);
	}

});



