$(document).ready
(   
    function ()
    {  
        setTimeout(cambiarTipoComprobantesBox(), 500); 

        $("#Busqueda_Numero_Identificacion").change( function () {
                        setTimeout(buscar_timbrados(), 1000);
            } );
        
        $("#Comprobantes_id_tipos_comprobantes").change( function () {
                        setTimeout(buscar_timbrados(), 1000);
                        setTimeout(displayComboTimbrados(), 700);             
            } );    
       
    }    
    
    
    
 );

function cambiarTipoComprobantesBox()
    {   
        var tipoDeRegistro = $("#Comprobantes_id_tipo_registro").val();
        //creamos variable donde se irá concatenando el html del combobox a generarse, abrimos <select>
        var comboBoxHtml = "<select name=\"Comprobantes[id_tipos_comprobantes]\" id=\"Comprobantes_id_tipos_comprobantes\">";

        $.ajax({
            url: "CambiarComboBox",
            type: 'POST',
            data:"&tipoDeRegistro="+tipoDeRegistro,
            success:  function(response, status) 
            {   
                                response = eval(response);
                                                              
                                if (response[0] != null)
                                    {
                                        //En caso de obtener un resultado, seguiremos concatenando el combobox
                                        for(var k in response) {
                                            comboBoxHtml = comboBoxHtml + 
                                                "<option value=\""+response[k]['id_tipos_comprobantes']+"\">" + response[k]['tipo_comprobante'] + "</option>";
                                        }

                                        comboBoxHtml = comboBoxHtml + "</select>";	//cerramos el select

                                        $("#Comprobantes_id_tipos_comprobantes").html(comboBoxHtml); //cambiamos html del combo
                                    
                                    }
                                    else 
                                     { 
                                       alert("Error al generarse Tipos de Comprobantes");
                                     }
    }});
    } 

    function buscar_timbrados()
    {   
        var comboBoxHtml =
        "<select class=\"input-medium\" name=\"Comprobantes[id_timbrado]\" id=\"Comprobantes_id_timbrado\"> <option value=\"\">Seleccione timbrado</option>"
        var tipoRegistro = parseInt($("#Comprobantes_id_tipo_registro").val());
        var id_user = parseInt($("#Comprobantes_cruge_user_id").val());
        var numero_ruc =  $("#Busqueda_Numero_Identificacion").val();
      
        if (tipoRegistro != 0)
        {
            if (tipoRegistro == 1)
                {var search_item =  $("#Busqueda_Numero_Identificacion").val();} //enviamos RUC o CI para COMPRA
                else {search_item =  id_user;} // tenemos user id para ver su ruc

            search_item = parseInt(search_item);

            $.ajax({
                url: "ObtenerTimbrados",
                type: 'POST',
                data:"&tipoDeRegistro="+tipoRegistro+"&searchItem="+search_item+"&iduser="+id_user+"&numeroRuc="+numero_ruc,
                success:  function(response, status) 
                {   
                                    response = eval(response);
                                                                
                                    if (response[0] != null)
                                        {
                                            //En caso de obtener un resultado, seguiremos concatenando el combobox
                                            for(var k in response) {
                                                comboBoxHtml = comboBoxHtml +"<option value=\""+response[k]['id_timbrado']+"\">"+response[k]['numero_timbrado'] +"</option>";
                                            }

                                            comboBoxHtml = comboBoxHtml + "</select>";	//cerramos el select

                                            //$("#Comprobantes_id_timbrado").html(comboBoxHtml); //cambiamos html del combo
                                        }
                                        else 
                                        {    
                                            comboBoxHtml = comboBoxHtml + "</select>";	//cerramos el select
                                            switch (response) {
                                                case 0:
                                                  mensaje = "Error al ejecutar la funcion asincrona";
                                                  break;
                                                case 1:
                                                  mensaje = "No se ha encontrado Usuario";
                                                  break;
                                                case 2:
                                                   mensaje = "Error del tipo de registro";
                                                  break;
                                                case 3:
                                                  mensaje = "No se encuentra Cliente de Venta";
                                                  break;
                                                case 4:
                                                  mensaje = "Numero de identificacion invalido";
                                                  break;
                                                case 5:
                                                  mensaje = "El cliente es igual al Usuario del sistema";
                                                  break;
                                                default:
                                                  mensaje = "Error al generarse Timbrados";
                                              } 
                                            alert(mensaje);
                                        }

                                        $("#Comprobantes_id_timbrado").html(comboBoxHtml); //cambiamos html del combo
    
                }});

        }
        



    } 

    function displayComboTimbrados()
    {
      var idtc =  parseInt($("#Comprobantes_id_tipos_comprobantes").val());
      var tipoRegistro = parseInt($("#Comprobantes_id_tipo_registro").val());
      
      if ( (idtc == 10) && (tipoRegistro == 1) ) 
        document.getElementById("timbradoDiv").style.display = 'none';
        else document.getElementById("timbradoDiv").style.display = 'inline';

    }