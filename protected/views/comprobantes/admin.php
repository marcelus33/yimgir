<?php

echo "<br>";

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Compra','url'=>array('compra')),
array('label'=>'Nueva Venta','url'=>array('venta')),
);
?>
<legend>Buscar Comprobantes</legend>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'comprobantes-grid',
'summaryText' => false,
'enableSorting' =>false,
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			'name' => 'id_tipo_registro',			
			'header' => 'Tipo Registro',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idTipoRegistro->tipo_registro)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
			),
		array(
			'name' => 'id_clientes',			
			'header' => 'Numero Identificacion',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idClientes->numero_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
			),
		array(
			'name' => 'id_tipos_comprobantes',			
			'header' => 'Tipo Comprobante',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idTiposComprobantes->tipo_comprobante)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 230px;')
			),
		array(
			'name' => 'numero_comprobante',			
			'header' => 'Numero Comprobante',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->numero_comprobante)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 150px;')
			),  
		array(
			'name' => 'id_timbrado',			
			'header' => 'Timbrado',			
			'type' => 'text', 
			'value'=>'$data->idTimbrado==null ? "" : $data->idTimbrado->numero_timbrado',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
		),
		array(
			'name' => 'total_importe',			
			'header' => 'Total Importe',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->total_importe, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
		),
		// 'total_importe',
		// 'ircp',
		// 'iva_general',
		// 'iva_simplificado',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array
			(
				'view' => array 
				(
					'url'=>'Yii::app()->createUrl("comprobantes/view/".$data->id_comprobantes)',
				),
				'update' => array
				(	
					'url'=>'($data->id_tipo_registro == 1 ? Yii::app()->createUrl("comprobantes/compraUpdate/".$data->id_comprobantes):Yii::app()->createUrl("comprobantes/ventaUpdate/".$data->id_comprobantes))',
				),
				'delete'=> array
				(
					'url'=>'Yii::app()->createUrl("comprobantes/delete/".$data->id_comprobantes)',
				),
			),
		),
	//array('class'=>'bootstrap.widgets.TbButtonColumn',),
),
)); ?>
