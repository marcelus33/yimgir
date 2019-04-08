$(document).ready(function(){
    
    
    $( "#opcionTxt" ).click(function() {
        var fecha_desde = $("#fecha_desde").val();
        var fecha_hasta =  $("#fecha_hasta").val();
        if (fecha_desde != '' && fecha_hasta != '') {
            $.ajax({
                    url: "reportesAjax",
                    type: 'POST',
                        data:"&fecha_desde="+fecha_desde+
                        "&fecha_hasta="+fecha_hasta,      
                        
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
        var fecha_hasta =  $("#fecha_hasta").val();

        if (fecha_desde != '' && fecha_hasta != '') {   
            
            $( "#enviarFechas" ).click();
        }
        else{
            swal("Atencion!", "Primero debe ingresar el rango de fechas", "warning")
        }
     });
  
});
