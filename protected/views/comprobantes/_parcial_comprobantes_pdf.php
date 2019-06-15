
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'comprobantes-grid',
'enableSorting' => false,
'summaryText' => false,
// 'hideHeader' => true,
'dataProvider'=>$dataProvider,
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
                'name' => 'documento_identificacion',			
                'header' => 'Doc Ident.',			
                'type' => 'text', 
                'value' => 'CHtml::encode($data->idClientes->idDocumentosIdentificacion->documento_identificacion)',
                'headerHtmlOptions'=>array('style' => 'text-align: center;'),
                'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
                ),
        array(
			'name' => 'id_clientes',			
			'header' => 'Identificacion',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idClientes->numero_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ),
        array(
                'name' => '>nombre_razon_social',			
                'header' => 'Razon Social',			
                'type' => 'text', 
                'value' => 'CHtml::encode($data->idClientes->nombre_razon_social)',
                'headerHtmlOptions'=>array('style' => 'text-align: center;'),
                'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
                ),
        array(
			'name' => 'id_tipos_comprobantes',			
			'header' => 'Tipo Comprobante',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idTiposComprobantes->tipo_comprobante)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ), 
        'numero_comprobante', 
        'fecha_expedicion',
        array(
            'name' => 'id_timbrado',			
            'header' => 'Timbrado',			
            'type' => 'text', 
            'value'=>'$data->idTimbrado==null ? "" : $data->idTimbrado->numero_timbrado',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),

        array(
			'name' => 'importe_iva_10',			
			'header' => 'IVA 10',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->total_importe, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_iva_5',			
			'header' => 'IVA 5',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->importe_iva_5, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_exenta',			
			'header' => 'Exenta',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->importe_exenta, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
		),
        array(
			'name' => 'total_importe',			
			'header' => 'Total Importe',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->total_importe, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
		),
        // 'id_timbrado',  
		//'total_importe',
		'ircp',
		'iva_general',
),
)); ?>