<br>
<legend></legend>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'comprobantes-grid',
'enableSorting' => false,
'summaryText' => false,
// 'hideHeader' => true,
'dataProvider'=>$dataProvider,
'columns'=>array(
        array(
            'name' => 'id_tipo_registro',			
            'header' => 'TIPO',			
            'type' => 'text', 
            'value' => 'CHtml::encode($data->idTipoRegistro->tipo_registro)',
            //'visible'=> '$data->idTipoRegistro->tipo_registro > 2',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ),
        array(
			'name' => 'numero_comprobante',			
			'header' => 'NUMERO',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->numero_comprobante)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 150px;')
            ),
        array(
            'name' => 'fecha_expedicion',			
            'header' => 'FECHA',			
            'type' => 'text', 
            //'value' => 'CHtml::encode($data->fecha_expedicion)',
            'value'=>'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->fecha_expedicion))',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
             ),  
        array(
            'name' => '>nombre_razon_social',			
            'header' => 'RAZON SOCIAL',			
            'type' => 'text', 
            'value' => 'CHtml::encode($data->idClientes->nombre_razon_social)',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: left; width: 250px;')
             ),  
/*        array(
                'name' => 'documento_identificacion',			
                'header' => 'Tipo Ident',			
                'type' => 'text', 
                'value' => 'CHtml::encode($data->idClientes->idDocumentosIdentificacion->documento_identificacion)',
                'headerHtmlOptions'=>array('style' => 'text-align: center;'),
                'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
                ),*/
        array(
			'name' => 'id_clientes',			
			'header' => 'IDENTIFICACION',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idClientes->numero_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ),
       
/*        array(
			'name' => 'id_tipos_comprobantes',			
			'header' => 'Tipo Comprobante',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idTiposComprobantes->tipo_comprobante)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ), */
        //'numero_comprobante', 
        //'fecha_expedicion',
        array(
            'name' => 'id_timbrado',			
            'header' => 'TIMBRADO',			
            'type' => 'text', 
            'value'=>'$data->idTimbrado==null ? "" : $data->idTimbrado->numero_timbrado',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_iva_10',			
			'header' => 'GRAVADAS 10%',			
			'type' => 'text', 
			'value'=>'Yii::app()->format->number($data->importe_iva_10/1.1)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_iva_10',			
			'header' => 'IMPUESTOS 10%',			
            'type' => 'text',
            'value'=>'Yii::app()->format->number($data->importe_iva_10/11)', 
			//'value'=>'Yii::app()->numberFormatter->formatDecimal($data->importe_iva_10, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_iva_5',			
			'header' => 'GRAVADAS 5%',			
            'type' => 'text',
            'value'=>'Yii::app()->format->number($data->importe_iva_5/1.05)', 
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_iva_5',			
			'header' => 'IMPUESTOS 5%',			
            'type' => 'text',
            'value'=>'Yii::app()->format->number($data->importe_iva_5/21)', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->importe_iva_5, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'importe_exenta',			
			'header' => 'EXENTAS',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->importe_exenta, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
		),
        array(
			'name' => 'total_importe',			
			'header' => 'TOTAL',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->total_importe, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
		),
        // 'id_timbrado',  
        //'total_importe',
        array(
			'name' => 'ircp',			
			'header' => 'IRPC',			
			'type' => 'text', 
            'value' => 'CHtml::encode($data->ircp)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 150px;')
            ),
        array(
			'name' => 'iva_general',			
			'header' => 'IVA GENERAL',			
			'type' => 'text', 
            'value' => 'CHtml::encode($data->iva_general)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 150px;')
            ),
),
)); ?>