<br>
<?php
// $this->breadcrumbs=array(
// 	'Documentos Identificacions'=>array('index'),
// 	$model->id_documentos_identificacion,
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Documento','url'=>array('create')),
array('label'=>'Editar','url'=>array('update','id'=>$model->id_documentos_identificacion)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_documentos_identificacion),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>


<?php 
// $this->widget('bootstrap.widgets.TbDetailView',array(
// 'data'=>$model,
// 'attributes'=>array(
// 		'id_documentos_identificacion',
// 		'documento_identificacion',
// ),
// )); 
?>
<legend>Documento de Identificacion</legend>
	<label style="font-size: 16px;"><b>Documento de Identificacion: </b><?php echo $model->documento_identificacion;?></label>