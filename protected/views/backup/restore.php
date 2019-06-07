<br>
<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Volver','url'=>array('index')),
);
?>

<div class="page-header">
  <h2>Importar datos</h2>
</div>

<form action="restore" method="POST" enctype="multipart/form-data" > 
         <input type="file" name="file_import" />
      
 
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Importar',
        )); ?>

</div>

</form>     

