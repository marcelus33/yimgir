<?php
$this->breadcrumbs=array(
	'Tipos Comprobantes'=>array('index'),
	$model->id_tipos_comprobantes=>array('view','id'=>$model->id_tipos_comprobantes),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_tipos_comprobantes)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>