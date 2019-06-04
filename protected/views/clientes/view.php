<br>
<?php
// $this->breadcrumbs=array(
// 	'Clientes'=>array('index'),
// 	$model->id_clientes,
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Cliente','url'=>array('create')),
array('label'=>'Editar','url'=>array('update','id'=>$model->id_clientes)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clientes),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>
<legend>Cliente</legend>
	<label style="font-size: 16px;"><b>Nombre o Razon Social: </b><?php echo $model->nombre_razon_social;?></label>
	<label style="font-size: 16px;"><b>Documento Identificacion Tipo: </b><?php echo $model->idDocumentosIdentificacion->documento_identificacion;?></label>
	<label style="font-size: 16px;"><b>Numero de Identificacion: </b><?php echo $model->numero_identificacion;?></label>
	<label style="font-size: 16px;"><b>DV: </b><?php echo $model->dv;?></label>
	
	
