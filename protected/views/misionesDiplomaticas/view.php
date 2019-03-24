<?php
$this->breadcrumbs=array(
	'Misiones Diplomaticases'=>array('index'),
	$model->id_misiones_diplomaticas,
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Actualizar','url'=>array('update','id'=>$model->id_misiones_diplomaticas)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_misiones_diplomaticas),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_misiones_diplomaticas',
		'mision_diplomatica',
),
)); ?>
