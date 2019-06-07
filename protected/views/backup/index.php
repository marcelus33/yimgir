<br>
<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
//array('label'=>'Volver','url'=>array('create')),
);
?>

<div class="page-header">
  <h1>Importar y Exportar datos</h1>
</div>

<div class="hero-unit">
  <h2>Favor elija una opción</h2>
  <p id="info">Tiene las siguientes opciones:</p><br>

  <form action="dump" method="POST" style="display:inline-block;margin-right:3em;">
    <img src="../img/export.png" alt="Export icon" width="50px">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'Exportar',                       
                'htmlOptions'=> array("class"=>"btn btn-primary btn-large btn2")
            )); ?>
  </form>  
  
  <form action="restore" method="POST" style="display:inline-block;">
  <img src="../img/import.png" alt="Import icon" width="50px">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'Importar',            
                'htmlOptions'=> array("class"=>"btn btn-primary btn-large btn1")
            )); ?>
  </form>

    
    
 
</div>

<div class="form-actions">



</div>

<?php

Yii::app()->clientScript->registerScript('info-mouseover', '

$( ".btn1" )
.mouseover(function() {
  $( "#info" ).text("Permite importar los datos que seleccione a su base de datos actual");
})
.mouseout(function() {
  $( "#info" ).text("Tiene las siguientes opciones:");
  });

$( ".btn2" )
.mouseover(function() {
  $( "#info" ).text("Permite exportar sus datos a un archivo en un directorio que elija");
})
.mouseout(function() {
  $( "#info" ).text("Tiene las siguientes opciones:");
  });

');

?>