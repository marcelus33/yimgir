$(document).ready
(   
    function ()
    {  
        //En el _form de COMPROBANTES utilizamos un widget ButtonGroup, de YIIBOOSTER
        //el widget utiliza unos "botones" que en verdad son elementos <a> de links
        //el widget por defecto les asigna un id y0, y1, como vemos mas abajo...
        var tipo_registro = 0;

        $("#yw0").click( function () {
                                            
                         setTimeout(cambiarValor(1), 500); //COMPRA
                         tipo_registro = 1;
            } );

        $("#yw1").click( function () {
                
                        setTimeout(cambiarValor(2), 500); // VENTA
                        tipo_registro = 2;
            } );

        $("#Busqueda_Numero_Identificacion").change( function () {
                        setTimeout(buscar_timbrados(tipo_registro), 1000);
            } );    
       
    }    
    
    
    
 );

function cambiarValor(boton)
    {   
        $("#Comprobantes_id_tipo_registro").val(boton);
        //creamos variable donde se irá concatenando el html del combobox a generarse, abrimos <select>
        var comboBoxHtml = "<select name=\"Comprobantes[id_tipos_comprobantes]\" id=\"Comprobantes_id_tipos_comprobantes\">";

        $.ajax({
            url: "CambiarComboBox",
            type: 'POST',
            data:"&tipoDeRegistro="+boton,
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

    function buscar_timbrados(tipo_registro)
    {   
        var comboBoxHtml =
        "<select class=\"input-medium\" name=\"Comprobantes[id_timbrado]\" id=\"Comprobantes_id_timbrado\"> <option value=\"\">Seleccione timbrado</option>"
        var tipoRegistro = tipo_registro;
        parseInt(tipoRegistro);
        //alert(tipoRegistro);
        if (tipoRegistro != 0)
        {
            if (tipoRegistro == 1)
                {var search_item =  $("#Busqueda_Numero_Identificacion").val();} //enviamos RUC o CI para COMPRA
                else {search_item =  $("#Comprobantes_cruge_user_id").val();} // tenemos user id para ver su ruc

            search_item = parseInt(search_item);

            $.ajax({
                url: "ObtenerTimbrados",
                type: 'POST',
                data:"&tipoDeRegistro="+tipoRegistro+"&searchItem="+search_item,
                success:  function(response, status) 
                {   
                                    response = eval(response);
                                                                
                                    if (response[0] != null)
                                        {
                                            //alert("Entro aca");
                                            //En caso de obtener un resultado, seguiremos concatenando el combobox
                                            for(var k in response) {
                                                comboBoxHtml = comboBoxHtml +"<option value=\""+response[k]['id_timbrado']+"\">"+response[k]['numero_timbrado'] +"</option>";
                                            }
                                            comboBoxHtml = comboBoxHtml + "</select>";	//cerramos el select

                                            $("#Comprobantes_id_timbrado").html(comboBoxHtml); //cambiamos html del combo
                                        }
                                        else 
                                        { 
                                             alert("Error al generarse Tipos de Comprobantes");
                                        }
    
                }});

        }
        



    } 
