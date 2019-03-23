<?php
$this->breadcrumbs=array(
	'Tipos Registroses'=>array('index'),
	$model->id_tipo_registro=>array('view','id'=>$model->id_tipo_registro),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_tipo_registro)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>