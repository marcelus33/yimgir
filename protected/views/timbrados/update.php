<?php
// $this->breadcrumbs=array(
// 	'Timbradoses'=>array('index'),
// 	$model->id_timbrado=>array('view','id'=>$model->id_timbrado),
// 	'Actualizar',
// );

	$this->menu=array(
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Nuevo Timbrado','url'=>array('create')),
	// array('label'=>'Ver','url'=>array('view','id'=>$model->id_timbrado)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

<div class="page-header">
  <h2>Editar Timbrado</h2>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>