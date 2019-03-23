<?php
$this->breadcrumbs=array(
	'Tipos Comprobantes'=>array('index'),
	$model->id_tipos_comprobantes,
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Actualizar','url'=>array('update','id'=>$model->id_tipos_comprobantes)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipos_comprobantes),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipos_comprobantes',
		'id_tipos_registros_tc',
		'tipo_comprobante',
),
)); ?>
