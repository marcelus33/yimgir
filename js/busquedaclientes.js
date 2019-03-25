$(document).ready
(   
    function ()
    {   //setTimeout(calculos_montos, 500);
        setTimeout(buscar_cliente, 1000);
       
       $("#Busqueda_Numero_Identificacion").change( function () {
                                            // Code to do stuff immediately
                         setTimeout(buscar_cliente, 500);
            } );
       
    }    
    
    
    
 );

function buscar_cliente()
    {   
        //$("#submit").attr("disabled", "disabled");
        var numero_identificacion = $("#Busqueda_Numero_Identificacion").val();
               
        $.ajax({
                url: "BuscarClientes",
                type: 'POST',
                data:"&numero_identificacion="+numero_identificacion,
                success:  function(response, status) 
                {   
                                    response = eval(response);
                                    //alert(response);
                                        
                                    /*
                                        var str = "Mr Blue has a blue house and a blue car";
                                        var res = str.replace(/blue/g, "red");
                                    */
                                    if (response[0] != null)
                                        {
                                        //response[0] = String(response[0]);
                                        $("#Nombre_razon_social").val(response[0]); //parseInt(
                                        $("#DV").val(response[1]);                               
                                        
                                        }
                                        else 
                                        { 
                                            $("#Nombre_razon_social").val("");
                                            $("#DV").val("");
                                            alert("El Numero de Identificacion ingresado no se encuentra registrado");
                                        }
        }});
    } 
