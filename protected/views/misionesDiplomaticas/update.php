<?php
$this->breadcrumbs=array(
	'Misiones Diplomaticases'=>array('index'),
	$model->id_misiones_diplomaticas=>array('view','id'=>$model->id_misiones_diplomaticas),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_misiones_diplomaticas)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>