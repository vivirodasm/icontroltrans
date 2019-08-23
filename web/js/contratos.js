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




// se llenan los datos relacionados con el tercero 
$('#tbcontratos-idtercero').change(function()
{
	alert();
	var d = new Date();
	var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
	
	idtercero = $(this).val();
	
	
	$( "input[name='anioActual']" ).val(strDate);
	
	$.get( "index.php?r=tbcontratos/tercero&idtercero="+idtercero,
				function( data )
				{
					
					// datos tercero
					$( "input[name='Identificacion']" ).val(data.idtercero);
					$( "input[name='digitoVerificacion']" ).val(data.dv_tercero);
					$( "input[name='Contratante']" ).val(data.nombrecompleto);
					$( "input[name='ciudad']" ).val();//pendeinte
					$( "input[name='telefono']" ).val(data.tel_tercero);
					
					// datos contacto
					$( "#tbcontratos-resp_contrato" ).val(data.contacto_tercero);
					$( "#tbcontratos-cedresp_contrato" ).val(data.ced_Contacto);
					$( "#tbcontratos-dirresp_contrato" ).val(data.dir_contacto);
					$( "#tbcontratos-telresp_contrato" ).val(data.tel_contacto);
					
					
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



$("#tbcontratos-vlrcontrato").change(function() 
{
	
	// Modo de uso: 500,34 USD
	valor = $(this).val();
	letras = numeroALetras(valor, {
	  plural: 'PESOS',
	  singular: 'PESO',
	  centPlural: 'CENTAVOS',
	  centSingular: 'CENTAVO'
	});

	$("input[name='valorLetras']").val(letras + "M/CTE");
	
		
});




var numeroALetras = (function() {

// Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
    function Unidades(num){

        switch(num)
        {
            case 1: return 'UN';
            case 2: return 'DOS';
            case 3: return 'TRES';
            case 4: return 'CUATRO';
            case 5: return 'CINCO';
            case 6: return 'SEIS';
            case 7: return 'SIETE';
            case 8: return 'OCHO';
            case 9: return 'NUEVE';
        }

        return '';
    }//Unidades()

    function Decenas(num){

        let decena = Math.floor(num/10);
        let unidad = num - (decena * 10);

        switch(decena)
        {
            case 1:
                switch(unidad)
                {
                    case 0: return 'DIEZ';
                    case 1: return 'ONCE';
                    case 2: return 'DOCE';
                    case 3: return 'TRECE';
                    case 4: return 'CATORCE';
                    case 5: return 'QUINCE';
                    default: return 'DIECI' + Unidades(unidad);
                }
            case 2:
                switch(unidad)
                {
                    case 0: return 'VEINTE';
                    default: return 'VEINTI' + Unidades(unidad);
                }
            case 3: return DecenasY('TREINTA', unidad);
            case 4: return DecenasY('CUARENTA', unidad);
            case 5: return DecenasY('CINCUENTA', unidad);
            case 6: return DecenasY('SESENTA', unidad);
            case 7: return DecenasY('SETENTA', unidad);
            case 8: return DecenasY('OCHENTA', unidad);
            case 9: return DecenasY('NOVENTA', unidad);
            case 0: return Unidades(unidad);
        }
    }//Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + ' Y ' + Unidades(numUnidades)

        return strSin;
    }//DecenasY()

    function Centenas(num) {
        let centenas = Math.floor(num / 100);
        let decenas = num - (centenas * 100);

        switch(centenas)
        {
            case 1:
                if (decenas > 0)
                    return 'CIENTO ' + Decenas(decenas);
                return 'CIEN';
            case 2: return 'DOSCIENTOS ' + Decenas(decenas);
            case 3: return 'TRESCIENTOS ' + Decenas(decenas);
            case 4: return 'CUATROCIENTOS ' + Decenas(decenas);
            case 5: return 'QUINIENTOS ' + Decenas(decenas);
            case 6: return 'SEISCIENTOS ' + Decenas(decenas);
            case 7: return 'SETECIENTOS ' + Decenas(decenas);
            case 8: return 'OCHOCIENTOS ' + Decenas(decenas);
            case 9: return 'NOVECIENTOS ' + Decenas(decenas);
        }

        return Decenas(decenas);
    }//Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let letras = '';

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + ' ' + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += '';

        return letras;
    }//Seccion()

    function Miles(num) {
        let divisor = 1000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
        let strCentenas = Centenas(resto);

        if(strMiles == '')
            return strCentenas;

        return strMiles + ' ' + strCentenas;
    }//Miles()

    function Millones(num) {
        let divisor = 1000000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMillones = Seccion(num, divisor, 'UN MILLON ', 'MILLONES DE');
        let strMiles = Miles(resto);

        if(strMillones == '')
            return strMiles;

        return strMillones + ' ' + strMiles;
    }//Millones()

    return function NumeroALetras(num, currency) {
        currency = currency || {};
        let data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: '',
            letrasMonedaPlural: currency.plural || 'PESOS CHILENOS',//'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular || 'PESO CHILENO', //'PESO', 'Dólar', 'Bolivar', 'etc'
            letrasMonedaCentavoPlural: currency.centPlural || 'CHIQUI PESOS CHILENOS',
            letrasMonedaCentavoSingular: currency.centSingular || 'CHIQUI PESO CHILENO'
        };

        if (data.centavos > 0) {
            data.letrasCentavos = 'CON ' + (function () {
                    if (data.centavos == 1)
                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
                    else
                        return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
                })();
        };

        if(data.enteros == 0)
            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
        else
            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    };

})();



