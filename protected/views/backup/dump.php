<br>
<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Volver','url'=>array('index')),
);
?>

<div class="page-header">
  <h2>Exportar datos</h2>
</div>


<form action="dump" method="POST" enctype="multipart/form-data"> 

         <input type="file" name="file_export"/><br>


 
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Exportar',
		)); ?>

</div>

</form> 