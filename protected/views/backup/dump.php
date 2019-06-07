<br>
<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Volver','url'=>array('create')),
);
?>

<div class="page-header">
  <h2>Exportar datos</h2>
</div>


<form action="dump" method="POST" enctype="multipart/form-data" > <!-- directory-->

 <h4>Presione Exportar para comenzar el proceso. Su archivo se exportará en:</h4>
 <p>En su escritorio en la carpeta <b>mgir_backup/exportar</b> </p>


 
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Exportar',
		)); ?>

</div>

</form> 