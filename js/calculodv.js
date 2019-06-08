// =============================================================================
// CALCULO DE DIGITO VERIFICADOR SEGUN SET en JS
// =============================================================================
$(document).ready
(   
    function ()
    {   //setTimeout(calculos_montos, 500);
        $("#Clientes_numero_identificacion").blur( function () {
            if ( verify_combo_ruc() )
                setTimeout(calculoDV(Clientes_numero_identificacion), 500);
                else  $("#Clientes_dv").val("");
        });

        $("#Clientes_id_documentos_identificacion").change( function () {
            if ( verify_combo_ruc() )
                setTimeout(calculoDV(Clientes_numero_identificacion), 500);
                else  $("#Clientes_dv").val("");
        });
       
    }    
    
    
 );


 function verify_combo_ruc(){
     var comboIdenTipo = $('#Clientes_id_documentos_identificacion').val(),
              numIdent =  $("#Clientes_numero_identificacion").val();

              if ( (comboIdenTipo == 1) && ( numIdent != "" && numIdent !== undefined ) ) 
                return true; 
                else return false;
 }


function calculoDV(nro_identi){

    var nro_identi = $("#Clientes_numero_identificacion").val();
    var calculo = Pa_Calcular_Dv_11_A(nro_identi);
    $("#Clientes_dv").val(calculo);
    $("#Clientes_direccion").focus();
 }





function Pa_Calcular_Dv_11_A(p_numero){
    p_numero = String(p_numero);
    p_basemax = 11;
    var v_total = 0;
    var v_resto = 0;
    var k = 0;
    var v_numero_aux = 0;
    var v_digit = 0;
    var v_numero_al = "";
    for (var i = 0; i < p_numero.length; i++) {
        var c = Number(p_numero.charAt(i));       
        v_numero_al += c.toString();
    } 
    k = 2;
    v_total = 0;
    for (var i = v_numero_al.length - 1; i >= 0; i --) {
        if(k > p_basemax){k = 2};
        v_numero_aux = Number(v_numero_al.charAt(i));
        v_total += (v_numero_aux * k);
        k = k + 1;    
    }
    v_resto = v_total % 11;  
    if(v_resto > 1){v_digit  = 11 - v_resto} else { v_digit = 0};
    return v_digit;
}

