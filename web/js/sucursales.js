$( document ).ready(function() 
{
	
 $( "#w2" ).on( 'beforeValidateAttribute', function( evt, attribute, messages ){
		
		// var _target = attribute.id.split( '-' );
		// var opcion = _target[0];
		// var index = _target[1];
		
		switch( attribute.id )
		{
			/* campos a validar  id de los campos*/
			
			case 'tbtercerossucursal-telsucursalter': 
			case 'tbtercerossucursal-movilsucursalter': 
			
				if($("#tbtercerossucursal-telsucursalter").val() !="" || $("#tbtercerossucursal-movilsucursalter").val() !="" )
				{
					
				}
				else
				{
					messages.push('No puede estar vacio');
				}
			
			break;
			
			default: break;
		}
	});
	
	
});


$("[name='departamentoSucursal']").change(function() 
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
						
					tbtercerossucursal = $("#tbtercerossucursal-ciudadsucursalter");
					
					tbtercerossucursal.html("");	
					tbtercerossucursal.trigger("chosen:updated");	
					
					tbtercerossucursal.append(opcionesCiudad);
					tbtercerossucursal.trigger("chosen:updated");
					
						
				},"json"
			);
	
	
});






