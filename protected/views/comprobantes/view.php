<?php

echo "<br>";

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Nueva Compra','url'=>array('compra')),
array('label'=>'Nueva Venta','url'=>array('venta')),
//array('label'=>'Editar','url'=>array('update','id'=>$model->id_comprobantes)),
array('label'=>'Editar','url'=>array(($model->id_tipo_registro == 1 ?"compraUpdate":"ventaUpdate"),'id'=>$model->id_comprobantes)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_comprobantes),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_comprobantes',
		'id_clientes',
		'id_tipos_comprobantes',
		'id_tipo_registro',
		'id_timbrado',
		'id_misiones_diplomaticas',
		'fecha_expedicion',
		'numero_comprobante',
		'importe_iva_5',
		'importe_iva_10',
		'importe_exenta',
		'total_importe',
		'ircp',
		'iva_general',
		'iva_simplificado',
),
)); ?>
