<?php
$this->breadcrumbs=array(
	'Timbradoses'=>array('index'),
	$model->id_timbrado=>array('view','id'=>$model->id_timbrado),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_timbrado)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>