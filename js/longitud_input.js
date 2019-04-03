$(document).ready(function(){

    var max_chars = 20;

    $('input.number').keydown( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });

    $('input.number').keyup( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });

  
});