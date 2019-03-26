<br>
<?php
// $this->breadcrumbs=array(
// 	'Tipos Comprobantes'=>array('index'),
// 	$model->id_tipos_comprobantes,
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Tipo Comprobante','url'=>array('create')),
array('label'=>'Editar','url'=>array('update','id'=>$model->id_tipos_comprobantes)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipos_comprobantes),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>


<?php 
// $this->widget('bootstrap.widgets.TbDetailView',array(
// 'data'=>$model,
// 'attributes'=>array(
// 		'id_tipos_comprobantes',
// 		'id_tipos_registros_tc',
// 		'tipo_comprobante',
// ),
// )); 
?>

<legend>Tipo Comprobante</legend>
	<label style="font-size: 16px;"><b>Tipo Registro: </b><?php echo $model->idTiposRegistrosTc->tipo_registro_tc;?></label>
	<label style="font-size: 16px;"><b>Tipo Comprobante: </b><?php echo $model->tipo_comprobante;?></label>
