<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_clientes,
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Actualizar','url'=>array('update','id'=>$model->id_clientes)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clientes),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_clientes',
		'id_documentos_identificacion',
		'numero_identificacion',
		'dv',
		'nombre_razon_social',
		'direccion',
		'telefono',
),
)); ?>
