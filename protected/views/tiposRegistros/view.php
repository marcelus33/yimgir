<?php
$this->breadcrumbs=array(
	'Tipos Registroses'=>array('index'),
	$model->id_tipo_registro,
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Actualizar','url'=>array('update','id'=>$model->id_tipo_registro)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_registro),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_registro',
		'tipo_registro',
),
)); ?>
