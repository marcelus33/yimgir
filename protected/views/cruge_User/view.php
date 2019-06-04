<?php
$this->breadcrumbs=array(
	'Cruge  Users'=>array('index'),
	$model->iduser,
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Actualizar','url'=>array('update','id'=>$model->iduser)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->iduser),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'iduser',
		'regdate',
		'actdate',
		'logondate',
		'username',
		'email',
		'password',
		'authkey',
		'state',
		'totalsessioncounter',
		'currentsessioncounter',
		'numero_identificacion_irpc',
),
)); ?>
