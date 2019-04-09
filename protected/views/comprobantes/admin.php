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
'dataProvider'=>$model->search(),
'filter'=>$model,
'summaryText' => '',
'columns'=>array(
		//'id_comprobantes',		
		//'id_tipo_registro',
		array (
			'header' =>'Tipo Registro',
			'name'=>'id_tipo_registro', /*asi incluimos el nombre de lo que anteriormente solo mostraba id */
			'value'=>'$data->idTipoRegistro->tipo_registro', //Yii::app()->dateFormatter->format("dd/MM/yy", ),
			'type'=>'text',
			),	
		//'id_tipos_comprobantes',
		array (
			'header' =>'Tipo Comprobante',
			'name'=>'id_tipos_comprobantes', 
			'value'=>'$data->idTiposComprobantes->tipo_comprobante', 
			'type'=>'text',
			),
		//'id_clientes',
		array (
			'header' =>'Numero de Identificacion',
			'name'=>'id_clientes', 
			'value'=>'$data->idClientes->numero_identificacion', 
			'type'=>'text',
			),
		array (
			'header' =>'Usuario',
			'name'=>'cruge_user_id', 
			'value'=>'$data->idCrugeUser->numero_identificacion_irpc',
			'type'=>'text',
			),		
		'numero_comprobante',
		//'fecha_expedicion',
		array (
			'header' =>'Fecha',
			'name'=>'fecha_expedicion', /*asi incluimos el nombre de lo que anteriormente solo mostraba id */
			'value'=>'Yii::app()->dateFormatter->format("dd/MM/yy", $data->fecha_expedicion)', //Yii::app()->dateFormatter->format("dd/MM/yy", ),
			'type'=>'text',
			),
		//'id_timbrado',
		//'total_importe',
		array (
			'header' =>'Importe total',
			'name'=>'total_importe', 
			'value'=>'number_format($data->total_importe, 0,",", ".")',
			'type'=>'text',
			),		
		/*		
		'id_misiones_diplomaticas',
		'importe_iva_5',
		'importe_iva_10',
		'importe_exenta',		
		'ircp',
		'iva_general',
		'iva_simplificado',
		*/
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
