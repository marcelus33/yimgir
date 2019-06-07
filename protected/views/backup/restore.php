<br>
<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Volver','url'=>array('create')),
);
?>

<div class="page-header">
  <h2>Importar datos</h2>
</div>

<form action="restore" method="POST" enctype="multipart/form-data" > 

<h4>Presione Importar para comenzar el proceso. Favor asegurese de:</h4>
 <p>El archivo se encuentre en su escritorio en la carpeta <b>mgir_backup/importar</b></p>
      
 
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Importar',
        )); ?>

</div>

</form>     

