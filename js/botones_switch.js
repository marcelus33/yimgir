$(document).ready
(   
    function ()
    {   
        setTimeout(comprobar_switchs, 5);
        
        document.getElementById('boton-irpc').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                //if checked
                document.getElementById("Comprobantes_ircp").value = "S";
                document.getElementById('boton-ivag').checked = false;
                document.getElementById("Comprobantes_iva_general").value = "N";
            } else {
                // if not checked ...
                document.getElementById("Comprobantes_ircp").value = "N";
                document.getElementById('boton-ivag').checked = true;
                document.getElementById("Comprobantes_iva_general").value = "S";
                document.getElementById('boton-ivas').checked = false;
                document.getElementById("Comprobantes_iva_simplificado").value = "N"            
            }
        };

        document.getElementById('boton-ivag').onclick = function() {
            
            if ( this.checked ) {
                document.getElementById("Comprobantes_iva_general").value = "S";
                document.getElementById('boton-irpc').checked = false;
                document.getElementById("Comprobantes_ircp").value = "N";
                document.getElementById('boton-ivas').checked = false;
                document.getElementById("Comprobantes_iva_simplificado").value = "N"
            } else {
                document.getElementById("Comprobantes_iva_general").value = "N";
                document.getElementById('boton-irpc').checked = true;
                document.getElementById("Comprobantes_ircp").value = "S";
                //document.getElementById('boton-ivas').checked = true;
                //document.getElementById("Comprobantes_iva_simplificado").value = "S"
            }
        };

        document.getElementById('boton-ivas').onclick = function() {
            
            if ( this.checked ) {
                document.getElementById("Comprobantes_iva_simplificado").value = "S"
                document.getElementById('boton-irpc').checked = true;
                document.getElementById("Comprobantes_ircp").value = "S";
                document.getElementById('boton-ivag').checked = false;
                document.getElementById("Comprobantes_iva_general").value = "N";
            } else {
                document.getElementById("Comprobantes_iva_simplificado").value = "N"
                //document.getElementById('boton-irpc').checked = false;
                //document.getElementById("Comprobantes_ircp").value = "N";
                //document.getElementById('boton-ivag').checked = true;
                //document.getElementById("Comprobantes_iva_general").value = "S";
            }
        };
           
    }    
    
    
    
 );

 function comprobar_switchs(){
     
    let irpc = $('#Comprobantes_ircp'),
        ivag = $('#Comprobantes_iva_general'),
        ivas = $('#Comprobantes_iva_simplificado');
 
        if (irpc.val() == 'S')
             document.getElementById('boton-irpc').checked = true;
             else document.getElementById('boton-irpc').checked = false;
 
        if (ivag.val() == 'S')
             document.getElementById('boton-ivag').checked = true;
             else document.getElementById('boton-ivag').checked = false;
 
        if (ivas.val() == 'S')
             document.getElementById('boton-ivas').checked = true;
             else document.getElementById('boton-ivas').checked = false;
 
  }