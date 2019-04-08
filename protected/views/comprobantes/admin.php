<?php

echo "<br>";

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Compra','url'=>array('compra')),
array('label'=>'Nueva Venta','url'=>array('venta')),
);

?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'comprobantes-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		'id_comprobantes',
		'id_clientes',
		'id_tipos_comprobantes',
		'id_tipo_registro',
		'id_timbrado',
		'id_misiones_diplomaticas',
		/*
		'fecha_expedicion',
		'numero_comprobante',
		'importe_iva_5',
		'importe_iva_10',
		'importe_exenta',
		'total_importe',
		'ircp',
		'iva_general',
		'iva_simplificado',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
