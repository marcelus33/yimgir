$(document).ready(function(){

     $('table tbody tr').click(function(e){
         $('#CrugeLogon_username').val(e.currentTarget.lastChild.innerText);
     }); 

    $('table tbody tr').on('mouseenter', function(e){
				$(e.currentTarget).css('color', 'blue');
            });
            
	$('table tbody tr').on('mouseleave', function(e){
				$(e.currentTarget).css('color', 'black');
			});


});