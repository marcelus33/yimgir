<?php


$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Editar','url'=>array('update','id'=>$model->id_timbrado)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_timbrado),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>

<div class="page-header">
  <h1>Datos del Timbrado</h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		array(             //aca introducimos campos que no estan directos  
			'label'=>'Numero Identificacion',
			'type'=>'raw',
			'value'=>$model->idClientes->numero_identificacion."-".$model->idClientes->dv, //este lo obtuvimos por las relaciones
			),
		array(             //aca introducimos campos que no estan directos  
			'label'=>'Nombre o Razon Social',
			 'type'=>'raw',
			 'value'=>$model->idClientes->nombre_razon_social, //este lo obtuvimos por las relaciones
				  ),
		'numero_timbrado',
),
)); ?>
