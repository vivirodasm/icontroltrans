$( document ).ready(function() 
{
	
		$("label[for = 'tbcontratos-sucursalactiva']").parent().hide();
		var opcionesCiudad = "";
		idPais = 169;
		$.get( "index.php?r=terceros/ciudades&idPais="+idPais,
				function( data )
				{
					$.each(data, function( index, datos) 
						{	
							opcionesCiudad = opcionesCiudad + '<option value="'+index+'">'+datos+'</option>';
							
						});
						
					$("#tbcontratos-ciudadorigen").append(opcionesCiudad);
					$("#tbcontratos-ciudaddestino").append(opcionesCiudad);
					$("#tbcontratos-ciudadorigen").trigger("chosen:updated");
					$("#tbcontratos-ciudaddestino").trigger("chosen:updated");
					
				},"json"
			);
			
});


		
$('#tbcontratos-sucursaltercero').click(function()
{
	idtercero = $("#tbcontratos-idtercero").val();
	tbcontratos = $("#tbcontratos-sucursalactiva");	
	if($(this).prop("checked") == true)
	{
		
		if(idtercero == null)
		{
			$(this).prop( "checked", false );
			swal.fire({
				title: 'Seleccione un tercero',
				type: 'error',
				confirmButtonText: 'Salir'
			});
			
		}
		else
		{
			$("label[for = 'tbcontratos-sucursalactiva']").parent().show();
			$.get( "index.php?r=tbcontratos/sucursal&idtercero="+idtercero,
				function( data )
				{
					var opciones = "";
					$.each(data, function( index, datos) 
						{	
							opciones = opciones +"<option value="+index+">"+datos+"</option>";
						});
						
					
					tbcontratos.html('');
					tbcontratos.trigger("chosen:updated");
					tbcontratos.append(opciones);
					tbcontratos.trigger("chosen:updated");
					
				},"json"
			);	
		}
	}
	else
	{
		tbcontratos.html('');
		tbcontratos.trigger("chosen:updated");
		$("label[for = 'tbcontratos-sucursalactiva']").parent().hide();
	
	
	}

});


$("#tbcontratos-fechainicio, #tbcontratos-fechafin").change(function() 
{
	inicio = $("#tbcontratos-fechainicio").val();
	fin = $("#tbcontratos-fechafin").val();
	var fechaini = new Date(inicio);
	var fechafin = new Date(fin);
	var diasdif= fechafin.getTime()-fechaini.getTime();
	var contdias = Math.round(diasdif/(1000*60*60*24));
	
	if (isNaN(contdias))
	{
		
	}
	else
	{
		$("#dias").val(contdias);
	}
	
	
});

