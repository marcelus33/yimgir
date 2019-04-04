$(document).ready(function(){
    
    
    $( "#generarTabla" ).click(function() {
        // alert("no funca");
       $.ajax({
               url: "reportesAjax",
               type: 'POST',
                   // data:"&numero_identificacion="+numero_identificacion,
                   success:  function(response, status) 
                   {   
                       if (response)
                       { 
                        alert("Archivo generado correctamente");
                        
                       }
                       else 
                           { 
                               alert("Error al generar el archivo");
                           }
                    }
                });
   
     });
  
});



function ExportTable(){
    $("table").tableExport({
    headings: false,                    // (Boolean), display table headings (th/td elements) in the <thead>
    footers: false,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
    formats: ["xlsx", "csv", "txt"],    // (String[]), filetypes for the export
    fileName: "id",                    // (id, String), filename for the downloaded file
    bootstrap: true,                   // (Boolean), style buttons using bootstrap
    position: "well" ,                // (top, bottom), position of the caption element relative to table
    ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file
    ignoreCols: null,                 // (Number, Number[]), column indices to exclude from the exported file
    ignoreCSS: ".tableexport-ignore"   // (selector, selector[]), selector(s) to exclude from the exported file
    });
}

/* Defaults */


