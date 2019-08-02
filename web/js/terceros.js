$( document ).ready(function() {
   $(".row:eq(2)").hide();
   $(".row:eq(3)").hide();
	
	$("#terceros-idpaises").change(function() 
	{
		var opcionesCiudad = "";
		idPais = $("#terceros-idpaises").val();
		$.get( "index.php?r=terceros/ciudades&idPais="+idPais,
				function( data )
				{
					$.each(data, function( index, datos) 
						{	
							opcionesCiudad = opcionesCiudad + '<option value="'+index+'">'+datos+'</option>';
							// console.log( index + ": " + datos );
						});
						
					$("#terceros-idcenpob").append(opcionesCiudad);
							// console.log( index + ": " + datos );
					$("#terceros-idcenpob").trigger("chosen:updated");
					
					$("#terceros-idcenpob").val(1765); 
					$("#terceros-idcenpob").trigger("chosen:updated");	
				},"json"
			);
			
	});
		
	$("#terceros-idpaises").val(169);
	$("#terceros-idpaises").trigger("change");

	
});


$("#terceros-nombre1_tercero, #terceros-nombre2_tercero ,#terceros-apellido1_tercero, #terceros-apellido2_tercero").blur(function() 
{
	nombre1 = $("#terceros-nombre1_tercero").val();
	nombre2 = $("#terceros-nombre2_tercero").val();
	apellido1 = $("#terceros-apellido1_tercero").val();
	apellido2 = $("#terceros-apellido2_tercero").val();
	
	$("#terceros-nombrecompleto").val(nombre1 +" "+nombre2+" "+apellido1 +" "+apellido2);
});



$("#terceros-naturalez_tercero").change(function() 
	{
		if($(this).val()== "N")
		{
			$(".row:eq(2)").show();
			$(".row:eq(3)").show();
			$("#terceros-nombrecompleto").attr('readonly', true);
		}
		else if($(this).val()== "J")
		{
			$(".row:eq(2)").hide()
			$(".row:eq(3)").show();
			$("#terceros-nombrecompleto").removeAttr('readonly');
		}
		else
		{
			$(".row:eq(2)").hide();
			$(".row:eq(3)").hide();
		}
	});
