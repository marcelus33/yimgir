<br>
<?php
// $this->breadcrumbs=array(
// 	'Clientes'=>array('index'),
// 	$model->id_clientes=>array('view','id'=>$model->id_clientes),
// 	'Actualizar',
// );

	$this->menu=array(
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Nuevo Cliente','url'=>array('create')),
	// array('label'=>'Mas Datos','url'=>array('view','id'=>$model->id_clientes)),
	array('label'=>'Buscar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>