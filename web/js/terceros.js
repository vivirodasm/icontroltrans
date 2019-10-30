$( document ).ready(function() 
{
	$('#w0').on('beforeSubmit', function (e) 
	{
		$.blockUI({ message: '<img src="../web/images/procesando1.GIF" height="60px" width="60px"/>' });
		return true;
	});
	// $( "#w0" ).submit(function( event ) {
	 
	// $.blockUI({ message: '<img src="../web/images/procesando1.GIF" height="60px" width="60px"/>' });
	

	// });
	
	
   $(".row:eq(2)").hide();
   $(".row:eq(3)").hide();
	
		
	$("#terceros-idpaises").val(169);
	
	/************************************************************************************************
	 * Aquí valido los campos que son obligatorios
	 * Para obligar a que sean obligatorios al array messages se le debe agregar el error
	 ************************************************************************************************/
	$( "#w0" ).on( 'beforeValidateAttribute', function( evt, attribute, messages ){
		
		// var _target = attribute.id.split( '-' );
		// var opcion = _target[0];
		// var index = _target[1];
		
		switch( attribute.id )
		{
			/* campos a validar  id de los campos*/
			case 'terceros-nombre1_tercero': 
			case 'terceros-apellido1_tercero': 
			case 'terceros-direccion_tercero': 
			
				
				var obligatorio = false;
				//se valida si #terceros-naturalez_tercero este en "PERSONA NATURAL" y que el campo no este vacio
				if( $( "#terceros-naturalez_tercero").val() == 'N' && $("#"+attribute.id+"").val() =='')
				{
					obligatorio = true;
				}
				
				//if obligatorio = true; se pone el mensaje en el campo y se obliga a llenar 		
				if( obligatorio)
					messages.push('No puede estar vacio');
				
			break;	
			case 'terceros-autdata':
	
				if($("#terceros-autdata").prop("checked") == false)
				{
					messages.push('No puede estar vacio');
				}
			break;
			
			case 'terceros-tel_tercero': 
			case 'terceros-movil_tercero': 
			
				if($("#terceros-tel_tercero").val() !="" || $("#terceros-movil_tercero").val() !="" )
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
	
	
	// $( "#w0" ).on( 'beforeSend', function( ){ //$("#mensaje").fadeIn(); 
			// alert();
	// });
});


$("[name='departamentos']").change(function() 
{
	departamento = $(this).val();
	
	var opcionesCiudad = "";
		idPais = $("#terceros-idpaises").val();
		$.get( "index.php?r=terceros/ciudades&idPais="+idPais+"&departamento="+departamento,
				function( data )
				{
					$.each(data, function( index, datos) 
						{	
							opcionesCiudad = opcionesCiudad + '<option value="'+index+'">'+datos+'</option>';
						});
						
					tercerosIdcenpob = $("#terceros-idcenpob");
					
					tercerosIdcenpob.html("");	
					tercerosIdcenpob.trigger("chosen:updated");	
					
					tercerosIdcenpob.append(opcionesCiudad);
					tercerosIdcenpob.trigger("chosen:updated");
					
						
				},"json"
			);
	
	
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

$("#terceros-idtercero").blur(function() 
{
	
	idTercero = $(this).val();
	
	if (idTercero !="")
	{
		$.get( "index.php?r=terceros/tercero&idTercero="+idTercero,
				function( data )
				{
					// alert(data);
					if(data == "si")
					{
						
						Swal.fire(
						{
						  title: 'Tercero ya existe',
						  type: 'info',
						  focusConfirm: false,
						  confirmButtonText:
							'Aceptar'
						});
					}
						
				},"json"
			);
	}
});




