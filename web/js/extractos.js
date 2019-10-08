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
				obj = $("#tbextractos-ciudadorigen");
				poblaciones(data.ciudadOrigen,obj);
				
				//ciudad origen contrato 
				obj = $("#tbextractos-ciudaddestino");
				poblaciones(data.ciudadDestino,obj);
				
				$("#tbextractos-fechainicio").trigger("change");
				//tipoContrato
				$("#tbextractos-tipocontrato").val(data.tipoContrato);
				
				//valor contrato 
				$("#tbextractos-vlrservicio").val(data.vlrContrato);
				$("#tbextractos-vlrfuec").val(data.vlrContrato * data.contabilidadFuec);
					
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
				arrayfechas =[];
				arrayfechas[0] = vechasVencidas(data.fechaVtoTO.fecha,vehvtoto);
				arrayfechas[1] = vechasVencidas(data.fechaVtoExtintor.fecha,vehvtoextintor);
				arrayfechas[2] = vechasVencidas(data.fechaVtoCDA.fecha,vehvtocda);
				arrayfechas[3] = vechasVencidas(data.fechaVtoSOAT.fecha,vehvtosoat);
				arrayfechas[4] = vechasVencidas(data.fechaVtoRCC.fecha,vehvtorcc);
				arrayfechas[5] = vechasVencidas(data.fechaVtoRCE.fecha,vehvtorce);
				arrayfechas[6] = vechasVencidas(data.fechaVtoRPbimest.fecha,vehvtobimestral);
				
				Swal.fire(
				{
				  title: ''+ data.estadoDocumentos,
				  type: 'info',
				  focusConfirm: false,
				  confirmButtonText:
					'aceptar'
				  
				}).then((result) => 
				{
					
				  if (data.estadoDocumentos.indexOf("vencido") > 1) 
				  {
					location.reload();
				  }
				});
		
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
		
		return 1;
	}
	else
	{
		 obj.val(fecha);
		 return 0;
	}
	
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
	vehiculo = $(this);
	$.get( 'index.php?r=tbextractos/conductores&placa='+placa,
	function( data )
	{
		stilo ="background-color:  #a93226;  color: white; border-radius: 5px;";
		if (data.length > 0)
		{
				html ="";
				html ='<fieldset class="scheduler-border">';
				html +='<legend class="scheduler-border">Conductores</legend>';
			$.each( data, function( key, value ) 
			{
				vtoSegSocial=value.vtoSegSocial.substr(0,10);
				vigLicencia=value.vigLicencia.substr(0,10);
				datos = value;
				
				
				
				html +='<div class="row">';
				html +='<div class="col-md-3"><label> Nombre conductor </label><select name="conductor[]" id="conductor-' + key +'" onchange="validarFechasConductor(this)" ><option value="0"> </option>';
				html += '<option value="'+ value.idtercero+ '">'+value.nombrecompleto+'</option>';
				html +='</select></div>';
				html +='<div class="col-md-2"><label> Nro licencia </label><input type="text"  value = "" name="nroLicencia[]"  id="nroLicencia-' + key +'" readOnly ></div>';
				html +='<div class="col-md-2"><label> Vig Seg Social</label> <input type="text" name="vtoSegSocial[]" id ="vtoSegSocial-' + key +'" value = "" readOnly ></div>';
				html +='<div class="col-md-2"><label>Vig Licencia</label> <input type="text" name="vigLicencia[]" id="vigLicencia-' + key +'" value = "" readOnly  ></div>';
				html +='</div>';
				
				
				
			});	

				html +='</fieldset>';
		}
		else
		{
			html ="";
				html ='<fieldset class="scheduler-border">';
				html +='<legend class="scheduler-border">Conductores</legend>';
				html +='<div class="row">';
				html +='<div class="col-md-4"><select><option value="0"></option>';
				html +='<option value="">Sin datos</option>';
				html +='</select></div>';
				html +='<div class="col-md-2"><label> Nro licencia </label><input type="text"  value = "sin datos" readOnly ></div>';
				html +='<div class="col-md-2"><label> Vig Seg Social</label> <input type="text" name="vtoSegSocial" value = "" readOnly ></div>';
				html +='<div class="col-md-2"><label>Vig Licencia</label> <input type="text" name="vigLicencia" value = "" readOnly  ></div>';
				html +='</fieldset>';
			
		}
		
		$("#conductores").html(html);
		
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


function validarFechasConductor(obj)
{
	mensaje = "";
	id = $(obj).attr("id").split("-")[1];
	
	vtoSegSocial =  datos.vtoSegSocial.substr(0,10);
	vigLicencia  =  datos.vigLicencia.substr(0,10);
	

	fechaFin = $("#tbextractos-fechafin").val();
	if(fechaFin == "")
	{
			Swal.fire({
	  title: 'Fecha fin',
	  text: "No puede estar vacia ",
	  type: 'warning',
	  confirmButtonColor: '#3085d6',
	  confirmButtonText: 'Aceptar',
		}).then((result) => {
		  if (result.value) 
		  {
			$("#conductor-"+id+"").val(0);
		  }
		})
	}
	else
	{
		
		// if (fechaActual() > vtoSegSocial )
		// {
			// mensaje += "Seguro Vencido <br>";
			// $("#conductor-"+id+"").val(0);
		// }
		
		// if ( fechaActual() > vigLicencia )
		// {
			// mensaje += "Licencia Vencida<br>";
			// $("#conductor-"+id+"").val(0);
		// }
		
		
		// if ( fechaFin > vigLicencia )
		// {
			// mensaje += "La vigencia de la licencia sobrepasa la fecha fin <br>"; 
			// $("#conductor-"+id+"").val(0);
		// }
		
		// if(mensaje =="")
		if(true)
		{
			
			if (fechaFin > vtoSegSocial )
				mensaje += "La vigencia del seguro social sobrepasa la fecha fin <br>";
			// mensaje ="";
			//dias vencimiento seguro social
			var fechaInicio = new Date( fechaActual() ).getTime();
			var fechaFin    = new Date( vtoSegSocial ).getTime();
			var diff = (fechaFin - fechaInicio)/(1000*60*60*24);
			mensaje += "la seguridad vence en "+diff+" días <br> ";
			
			//dias vencimiento licencia
			var fechaInicio = new Date( fechaActual() ).getTime();
			var fechaFin    = new Date( vigLicencia ).getTime();
			var diff = (fechaFin - fechaInicio)/(1000*60*60*24);
			mensaje += "la seguridad vence en "+diff+" días <br> ";
			
			
			$("#nroLicencia-"+id).val(datos.licencia);
			$("#vtoSegSocial-"+id).val(vtoSegSocial);
			$("#vigLicencia-"+id).val(vigLicencia);
			
		}
		
		Swal.fire(
		{
		  title: ''+ mensaje,
		  type: 'info',
		  focusConfirm: false,
		  confirmButtonText:
			'aceptar'
		  
		});
	
	}
	
	


	
}

//llenar las ciudadades de orien segun el departamento seleccionado
$("[name='departamentoCiudadOrigen']").change(function() 
{
	departamento = $(this).val();
	
	var opcionesCiudad = "";
		idPais = 169;
		$.get( "index.php?r=terceros/ciudades&idPais="+idPais+"&departamento="+departamento,
				function( data )
				{
					$.each(data, function( index, datos) 
						{	
							opcionesCiudad = opcionesCiudad + '<option value="'+index+'">'+datos+'</option>';
						});
						
					chosen = $("#tbextractos-ciudadorigen");
					
					chosen.html("");	
					chosen.trigger("chosen:updated");	
					
					chosen.append(opcionesCiudad);
					chosen.trigger("chosen:updated");
					
						
				},"json"
			);
	
	
});

$("[name='departamentoCiudadDestino']").change(function() 
{
	departamento = $(this).val();
	
	var opcionesCiudad = "";
		idPais = 169;
		$.get( "index.php?r=terceros/ciudades&idPais="+idPais+"&departamento="+departamento,
				function( data )
				{
					$.each(data, function( index, datos) 
						{	
							opcionesCiudad = opcionesCiudad + '<option value="'+index+'">'+datos+'</option>';
						});
						
					chosen = $("#tbextractos-ciudaddestino");
					
					chosen.html("");	
					chosen.trigger("chosen:updated");	
					
					chosen.append(opcionesCiudad);
					chosen.trigger("chosen:updated");
					
				},"json"
			);
	
	
});

function poblaciones(idCenPob,obj)
{
	
	pob = "";
	idPais = 169;
	$.get( "index.php?r=tbextractos/ciudades&idPais="+idPais+"&idCenPob="+idCenPob,
			function( data )
			{
				pob = "";
				$.each(data, function( index, datos) 
					{	
						pob = pob + '<option value="'+index+'">'+datos+'</option>';
						
						//llenar select de ciudad
						chosen = $(obj);
						chosen.html("");	
						chosen.trigger("chosen:updated");	
						chosen.append( pob );
						chosen.val(index);
						chosen.trigger("chosen:updated");
					});
					
				
					//llenar departamento orien
				if($(obj).attr("id").indexOf("origen") > -1)
				{
					departamento = pob.split("-")[2].split("<")[0];
					// $( "input[name='departamentoCiudadOrigen']" ).val(departamento);
					departamentoOrigen= $( "#w1" );
					
					departamentoOrigen.val(departamento);
					departamentoOrigen.trigger("chosen:updated");
				}
				
				//llenar departamento destino
				if($(obj).attr("id").indexOf("destino") > -1)
				{
					departamento = pob.split("-")[2].split("<")[0];
					// $( "input[name='departamentoCiudadOrigen']" ).val(departamento);
					departamentoOrigen= $( "#w2" );
					
					departamentoOrigen.val(departamento);
					departamentoOrigen.trigger("chosen:updated");
				}
				
			},"json"
		);
	
}


//calcular la diferencia de dias entre fechainicio y fecha fin
$("#tbextractos-fechainicio, #tbextractos-fechafin").change(function() 
{

	inicio = $("#tbextractos-fechainicio").val();
	fin = $("#tbextractos-fechafin").val();
	var fechaini = new Date(inicio);
	var fechafin = new Date(fin);
	var diasdif= fechafin.getTime()-fechaini.getTime();
	var contdias = Math.round(diasdif/(1000*60*60*24));
	
	
	if (isNaN(contdias))
	{
		
	}
	else
	{
		$("#diasExtractos").val(contdias);
	}
	
	
});


//varios destino 
$("#tbextractos-destinosvarios").change(function() 
{
	// $("#w2_chosen").parent().append('<select id="variosDestinos" >  <option value="volvo">Volvo</option>  </select>');
	$("#variosDestinos").toggle();
	$("#w2_chosen").toggle();
	$("#w2_chosen").siblings("label").toggle();
	$(".field-tbextractos-ciudaddestino").toggle();
	// $("#w2_chosen").parent().toggle();
	
	//si no esta checked borrar los datos
	if (!$(this).checked) 
	{
		$("#tbextractos-descripdestino").val("");
		$("#idVariosDestinos").val("");
	}
 
});



//varios destino 
$("#idVariosDestinos").change(function() 
{
	idDestinoFUEC = $(this).val();
	$.get( "index.php?r=tbextractos/decripcion-destino&idDestinoFUEC="+idDestinoFUEC,
			function( data )
			{
				$("#tbextractos-descripdestino").val(data);
			},"json"
		);
});



