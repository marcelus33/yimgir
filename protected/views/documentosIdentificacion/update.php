<?php
$this->breadcrumbs=array(
	'Documentos Identificacions'=>array('index'),
	$model->id_documentos_identificacion=>array('view','id'=>$model->id_documentos_identificacion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_documentos_identificacion)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>