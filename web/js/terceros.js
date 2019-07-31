$( document ).ready(function() {
    $("#terceros-idpaises").val(169);
	$("#terceros-idpaises").trigger("change");
});



$("#terceros-idpaises").change(function() 
{
	
	idPais = $("#terceros-idpaises").val();
    $.get( "index.php?r=terceros/ciudades&idPais="+idPais,
			function( data )
			{
				
				$.each(data, function( index, datos) 
					{
						
						$("#terceros-idcenpob").append('<option value="'+index+'">'+datos+'</option>');
						// console.log( index + ": " + datos );
						
					});
					
				$("#terceros-idcenpob").trigger("chosen:updated");
				
				$("#terceros-idcenpob").val(1765); 
				$("#terceros-idcenpob").trigger("chosen:updated");	
			},"json"
		);
		
});