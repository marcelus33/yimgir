<br>
<?php
// $this->breadcrumbs=array(
// 	'Documentos Identificacions'=>array('index'),
// 	$model->id_documentos_identificacion=>array('view','id'=>$model->id_documentos_identificacion),
// 	'Actualizar',
// );

	$this->menu=array(
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Nuevo Documento','url'=>array('create')),
	// array('label'=>'Ver','url'=>array('view','id'=>$model->id_documentos_identificacion)),
	array('label'=>'Buscar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>