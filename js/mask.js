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

    $("#Comprobantes_numero_comprobante").change( function()
        {
            setTimeout(rellenarMascara, 200);

    });

  

  });

  function rellenarMascara ()
  {
    var valorComboTC = parseInt($('#Comprobantes_id_tipos_comprobantes option:checked').val());
    var inputNumComprobante = String( $("#Comprobantes_numero_comprobante").val() );
    var longCadena = inputNumComprobante.length;//must be 15
    var diferencia = 0; var index; var difslice = 0;
    var stringDif = ''; var slice = '';

    if ((valorComboTC != 5)||(valorComboTC != 10))  
    {
      if (longCadena < 15 && longCadena > 8) 
      { 
        diferencia = 15 - longCadena;

        for (index = 0; index < diferencia; index++) {
          stringDif = stringDif.concat('0');          
        }
        
        difslice = 7 - diferencia;
        slice = inputNumComprobante.slice((inputNumComprobante.length-difslice), inputNumComprobante.length);
        inputNumComprobante = inputNumComprobante.slice( 0, (inputNumComprobante.length-difslice) );
        inputNumComprobante = inputNumComprobante.concat( stringDif, slice );

        $("#Comprobantes_numero_comprobante").val(inputNumComprobante);
      }
    }
} 
