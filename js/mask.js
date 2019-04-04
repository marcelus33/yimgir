$(document).ready(function(){    
  
  $('#Comprobantes_numero_comprobante').mask("000-000-0000000", {placeholder: "000-000-0000000"});
  $('#Comprobantes_fecha_expedicion').mask("00-00-0000", {placeholder: "mm-dd-aaaa"});
  

  $("#Comprobantes_id_tipos_comprobantes").change( function () {

        var valorComboTC = parseInt($('#Comprobantes_id_tipos_comprobantes option:checked').val());
        
        if ((valorComboTC == 5)||(valorComboTC == 10))     
          $('#Comprobantes_numero_comprobante').mask("0000000000000", {placeholder: "Ingrese numero de comprobante"});
        else
          $('#Comprobantes_numero_comprobante').mask("000-000-0000000", {placeholder: "000-000-0000000"});
   
    } );

  

  });

//en el onchange del combobox del tipo de documento hay que hacer que cambie la mascara LOL