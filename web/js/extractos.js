$( document ).ready(function() 
{



});

//informacion del contrato
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
				
				//valor contrato 
				$("#tbextractos-vlrservicio").val(data.vlrContrato);
					
			},'json'
				);
	
});

//validaciones de las fechas de vencimientos de los documentos del vehiculo
$("#tbextractos-idvehiculo").change(function() 
{
	filtro = $(this).val();
	$.get( 'index.php?r=tbextractos/doc-vehiculos&placa='+filtro,
			function( data )
			{
				
				$("#claseVehiculo").val(data.clase);
				
				if( data.emprAfil.emprAfil != nombreEmpresa)
				{
					$("#tbextractos-convenioemp").val(data.emprAfil.emprAfil);
					$("#tbextractos-fechavtoconvenio").val(data.emprAfil.fechaVtoConvenio.substr(0,10));
				}
				
				
				vehvtoto = $("#tbextractos-vehvtoto");
				vehvtoextintor = $("#tbextractos-vehvtoextintor");
				vehvtocda = $("#tbextractos-vehvtocda");
				vehvtosoat = $("#tbextractos-vehvtosoat");
				vehvtorcc = $("#tbextractos-vehvtorcc");
				vehvtorce = $("#tbextractos-vehvtorce");
				vehvtobimestral = $("#tbextractos-vehvtobimestral");
				
				//validaciones de fecha 
				
				vechasVencidas(data.fechaVtoTO.fecha,vehvtoto);
				vechasVencidas(data.fechaVtoExtintor.fecha,vehvtoextintor);
				vechasVencidas(data.fechaVtoCDA.fecha,vehvtocda);
				vechasVencidas(data.fechaVtoSOAT.fecha,vehvtosoat);
				vechasVencidas(data.fechaVtoRCC.fecha,vehvtorcc);
				vechasVencidas(data.fechaVtoRCE.fecha,vehvtorce);
				
				vechasVencidas(data.fechaVtoRPbimest,vehvtobimestral);
				
				
				estadoDoc = "";
				$.each(data.estadoDocumentos, function (index, value) 
				{
					// alert(value);
					estadoDoc = estadoDoc + value +"<br>";

				});
				
				swal(estadoDoc);

			},'json'
				);
	
});

//valida si la fecha esta vencida y aplica el atributo 
function vechasVencidas(fecha, obj)
{
	estilo ="background-color:  #a93226;  color: white; border-radius: 5px;";
	obj.attr("style","");
	if (fecha.substr(10) == "vencido" || fecha.substr(0,8) == "No posee") 
	{
		
		obj.attr("style",estilo);
		obj.val(fecha.substr(0,10));
	}
	else
	{
		 obj.val(fecha);
	}
	
}

function swal(mensaje)
{
	Swal.fire(
	{
	  title: ''+ mensaje,
	  type: 'info',
	  focusConfirm: false,
	  confirmButtonText:
		'aceptar'
	  
	});
	
}

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

//validaciones de las fechas de vencimientos de los documentos del conductor 
$("#tbextractos-idvehiculo").change(function() 
{
	placa = $(this).val();
	
	$.get( 'index.php?r=tbextractos/conductores&placa='+placa,
	function( data )
	{
		stilo ="background-color:  #a93226;  color: white; border-radius: 5px;";
		if (data.length > 0)
		{

			$.each( data, function( key, value ) 
			{
				vtoSegSocial=value.vtoSegSocial.substr(0,10);
				vigLicencia=value.vigLicencia.substr(0,10);
				
				campovtoSegSocial = '<label> Vig Seg Social</label> <input type="text" name="vtoSegSocial' + key +'" value = "'+vtoSegSocial+'" readOnly >';
				if (fechaActual() > vtoSegSocial) 
				{
					
					campovtoSegSocial ='<label>Vig Seg Social</label><input type="text" name="vtoSegSocial' + key+'" value = "'+vtoSegSocial+'" readOnly style = "'+stilo+'" >';
				}
				
				campovigLicencia = '<label>Vig Licencia</label> <input type="text" name="vtoSegSocial' + key +'" value = "'+vigLicencia+'" readOnly style = "'++'" >';
				
				if (fechaActual() > vigLicencia) 
				{
					campovigLicencia = '<label>Vig Licencia </label><input type="text" name="vtoSegSocial' + key +'" value = "'+vigLicencia+'" readOnly style = "'+stilo+'" >';
				}
				
				$("#conductores").html('<div><label>Nombre del conductor</label> <input type="text" name="nombre' + key+ '" value = "'+value.nombrecompleto+'" readOnly >	<label>identificación </label><input type="text" name="idtercero' + key+'" value = "'+value.idtercero +'" readOnly ><label> Nro licencia</label> <input type="text" name="licencia' + key +'" value = "'+value.licencia +'" readOnly >	'+campovtoSegSocial+' '+campovigLicencia+'<button onclick="borrarConductor(this)" type="button">x</button></div> ');
			});		 
		}
		else
		{
			$("#conductores").html('Nombre del conductor <input type="text" style = "'+stilo+'" value = "sin datos" readOnly  >	 identificación <input type="text" style = "'+stilo+'" value = "sin datos" readOnly > Nro licencia <input type="text"  style = "'+stilo+'" value = "sin datos" readOnly >	Vig Licencia <input type="text" style = "'+stilo+'" value = "sin datos" readOnly >	Vig Seg Social <input type="text"  style = "'+stilo+'" value = "sin datos" readOnly > ');
		}
		
		
	},'json'
		);

});



//rutas 
$(" #tbextractos-idruta ").change(function() 
{
		idRuta = $(this).val();
		descripruta = $("#tbextractos-descripruta" ).val();
		$.get( 'index.php?r=tbextractos/rutas&idRuta='+idRuta,
		function( data )
		{
			descripruta = descripruta + data;
			$("#tbextractos-descripruta" ).val(descripruta);
			
		},'json'
			);
});

//identificacion del tercero o contratante 
$(" #tbextractos-idtercero ").change(function() 
{
	$(" #docTercero").val($(this).val());
});


function fechaActual()
{
	
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var fecha = d.getFullYear() + '-' +
		(month<10 ? '0' : '') + month + '-' +
		(day<10 ? '0' : '') + day;

	return fecha;
	
}


function borrarConductor(obj)
{
	Swal.fire({
  title: '¿Esta seguro?',
  text: "Esta apunto de borrar el conductor",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar'
	}).then((result) => {
	  if (result.value) 
	  {
		$(obj).parent().remove();	
	  }
	})
	
}

