$(document).ready(function(){
    
    
    $( "#opcionTxt" ).click(function() {
        var fecha_desde = $("#fecha_desde").val();
        var fecha_hasta =  $("#fecha_hasta").val();
        var tipo_registro =  $("#mySelect").val();
        if (fecha_desde != '' && fecha_hasta != '') {
            $.ajax({
                    url: "reportesAjax",
                    type: 'POST',
                        data:"&fecha_desde="+fecha_desde+
                        "&fecha_hasta="+fecha_hasta+"&tipo_registro="+tipo_registro,      
                        
                        success:  function(response, status) 
                        {   
                            if (response)
                            { 
                                swal({
                                    title: "Éxito",
                                    text: "Archivo TXT generado correctamente en C:/reportes",
                                    type: "success",
                                  }); 

                                
                            }
                            else 
                                { 
                                    alert("Error al generar el archivo");
                                }
                            }
                });
        }
        else{
            alert("Debe ingresar el rango de fechas");
        }
   
     });

     $( "#opcionExcel" ).click(function() {
        var fecha_desde = $("#fecha_desde").val();
        var fecha_hasta = $("#fecha_hasta").val();
        var drop_value =  $("#mySelect").val();

        if (fecha_desde != '' && fecha_hasta != '') {   
            
            $( "#enviarFechas" ).click();
        }
        else{
            swal("Atencion!", "Primero debe ingresar el rango de fechas", "warning")
        }
     });

     $( "#opcionPdf" ).click(function() {

        var fecha_desde = $("#fecha_desde").val();
        var fecha_hasta =  $("#fecha_hasta").val();
        var tipo_registro =  $("#mySelect").val();

        if (fecha_desde != '' && fecha_hasta != '') {

            $.ajax({
                    url: "reportesAjaxPdf",
                    type: 'POST',
                        data:"&fecha_desde="+fecha_desde+
                        "&fecha_hasta="+fecha_hasta+"&tipo_registro="+tipo_registro,      
                        
                        success:  function(response, status) 
                        {   
                            if (response == 1)
                            { 
                                swal({
                                    title: "Éxito",
                                    text: "Archivo PDF generado correctamente en C:/reportes",
                                    type: "success",
                                  }); 

                                
                            }
                            else 
                                { 
                                    swal({
                                        title: "Error",
                                        text: "Error al generarse el archivo, probablemente el Cliente no tenga Comprobantes en el rango de fechas solicitado",
                                        type: "error",
                                      }); 
                                }
                            }
                });
        }
        else{
            alert("Debe ingresar el rango de fechas");
        }
   
     });
  
});
