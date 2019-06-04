<?php
$this->breadcrumbs=array(
	'Cruge  Users'=>array('index'),
	$model->iduser=>array('view','id'=>$model->iduser),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->iduser)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>