$(document).ready
(   
    function ()
    {  
        
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
                                                                  
                                    if (response[0] != null)
                                        {
                                        //response[0] = String(response[0]);
                                        $("#Nombre_razon_social").val(response[0]); //parseInt(
                                        $("#DV").val(response[1]);
                                        $("#Timbrados_id_clientes").val(response[2]);
                                        //este se utiliza para la vista de Comprobantes
                                        $("#Comprobantes_id_clientes").val(response[2]);
                                        
                                        }
                                        else 
                                        { 
                                            $("#Nombre_razon_social").val("");
                                            $("#DV").val("");
                                            //alert("El Numero de Identificacion ingresado no se encuentra registrado");
                                            swal({
                                                title: "Atención",
                                                text: "El Numero de Identificacion ingresado no se encuentra registrado",
                                                type: "info",
                                              }); 
                                        }
        }});
    } 


