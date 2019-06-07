<?php

echo "<br>";

	$this->menu=array(
	//array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Nueva Compra','url'=>array('compra')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_comprobantes)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<div class="page-header">
  <h1>Editar Compra</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
    'id_registro'=>$id_registro, 'contribuyente'=>$contribuyente)); ?>