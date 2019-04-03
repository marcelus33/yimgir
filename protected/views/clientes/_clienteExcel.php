<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$dataProvider,
//'filter'=>$model,
'enableSorting' => false,
'summaryText' => '',
'columns'=>array(
		array(
			'name' => 'id_documentos_identificacion',			
			'header' => '',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idDocumentosIdentificacion->documento_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: left; width: 100px;')
			),
		array(
			'name' => 'numero_identificacion',
			'header' => '',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->numero_identificacion)',
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
			),
		array(
			'name' => 'dv',
			'header' => '',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->dv)',
			'htmlOptions'=>array('style' => 'text-align: right;')
			),
		array(
			'name' => 'nombre_razon_social',
			'header' => '',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->nombre_razon_social)',
			'htmlOptions'=>array('style' => 'text-align: right;')
			),
),
)); ?>