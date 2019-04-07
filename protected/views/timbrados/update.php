<?php
$this->breadcrumbs=array(
	'Timbradoses'=>array('index'),
	$model->id_timbrado=>array('view','id'=>$model->id_timbrado),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Crear Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id_timbrado)),
	array('label'=>'Buscar','url'=>array('admin')),
	);
	?>

<div class="page-header">
  <h1>Editar Timbrado</h1>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>