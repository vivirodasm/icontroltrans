$( document ).ready(function() 
{
	
 
		
	// $("#terceros-idpaises").val(169);
	
	
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






