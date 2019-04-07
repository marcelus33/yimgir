$(document).ready
(   
    function ()
    {  

        $("#Comprobantes_importe_iva_5").change( function () {
                        var monto = $("#Comprobantes_importe_iva_5").val() ;
                        monto = monto.split('.').join("");//.replace(/./g, "");
                        monto =  parseInt( monto );
                        var iva = calculo_iva(monto,5);
                        $("#calc_iva5").val(iva);
                        $("#Comprobantes_total_importe").val( sumar_importes() ) ;
                        $("#calc_total").val( sumar_importes_iva() ) ;
                        $("#calc_siniva").val( total_sin_iva() ) ;
            } );
        
        $("#Comprobantes_importe_iva_10").change( function () {
                        var monto = $("#Comprobantes_importe_iva_10").val() ;
                        monto = monto.split('.').join("");//.replace(/./g, "");//.replace(".", "");
                        monto =  parseInt( monto );
                        var iva = calculo_iva(monto,10);
                        $("#calc_iva10").val(iva);
                        $("#Comprobantes_total_importe").val( sumar_importes() ) ;
                        $("#calc_total").val( sumar_importes_iva() ) ;
                        $("#calc_siniva").val( total_sin_iva() ) ;
            } );

        $("#Comprobantes_importe_exenta").change( function () {
                         $("#Comprobantes_total_importe").val( sumar_importes() ) ;
                         $("#calc_total").val( sumar_importes_iva() ) ;
                         $("#calc_siniva").val( total_sin_iva() ) ;
        } );     
       
    }    
    
    
    
 );

 var total_importe = 0;
 var total_iva = 0;

 function calculo_iva(monto, coef)
    { 
        var amount = parseInt(monto);
        var coeff = parseInt(coef);
        coeff = parseInt(100/coef);
        var result = 0;
        //vamos a truncar el numero, viendo que (flotante - entero = decimales)
        resultInt = parseInt(( ( (amount*coeff) / (coeff+1) ) / coeff ));
        resultFloat = parseFloat(( ( (amount*coeff) / (coeff+1) ) / coeff ));
        var decimal = parseFloat( resultFloat - parseFloat(resultInt) );
        if ( decimal >= 0.5 ) //si los decimales son >= a 5 entonces sumamos 1, sino no
            result = resultInt + 1;
            else result = resultInt;

        return formatNumber(result) ;

    }

function sumar_importes()
{
    var importe5 = $("#Comprobantes_importe_iva_5").val() ;
    importe5 = importe5.split('.').join("");//.replace(/./g, '');
    importe5 = parseInt(importe5);
    if (!importe5)
        importe5 = 0;

    var importe10 = $("#Comprobantes_importe_iva_10").val() ;
    importe10 = importe10.split('.').join("");//.replace(".", "");
    importe10 = parseInt(importe10);
    if (!importe10)
        importe10 = 0;

    var importeExen = $("#Comprobantes_importe_exenta").val() ;
    importeExen = importeExen.split('.').join("");//.replace(".", "");
    importeExen = parseInt(importeExen);
    if (!importeExen)
        importeExen = 0;

    var suma = importe5 + importe10 + importeExen;
    
    total_importe = suma; //variable global

    return formatNumber(suma);

}

function sumar_importes_iva()
{
    var importe5 = $("#calc_iva5").val() ;
    importe5 = importe5.split('.').join("");//.replace(".", "");
    importe5 = parseInt(importe5);
    if (!importe5)
        importe5 = 0;

    var importe10 = $("#calc_iva10").val() ;
    importe10 = importe10.split('.').join("");//.replace(".", "");
    importe10 = parseInt(importe10);
    if (!importe10)
        importe10 = 0;

    var suma = importe5 + importe10;

    total_iva = suma; //varibale global

    return formatNumber(suma); //en el calc_total

}

function total_sin_iva()
{   
    var resta = parseInt(total_importe - total_iva);
    return  formatNumber(resta); //en el calc_siniva

}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
  }