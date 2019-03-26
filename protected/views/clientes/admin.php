<br>
<?php
// $this->breadcrumbs=array(
// 	'Clientes'=>array('index'),
// 	'Administrar',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Cliente','url'=>array('create')),
);

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// $('.search-form').toggle();
// return false;
// });
// $('.search-form form').submit(function(){
// $.fn.yiiGridView.update('clientes-grid', {
// data: $(this).serialize()
// });
// return false;
// });
// ");
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		// 'id_clientes',
		// 'id_documentos_identificacion',
		array(
			'name' => 'id_documentos_identificacion',			
			'header' => 'Documento Identificacion',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idDocumentosIdentificacion->documento_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: left; width: 100px;')
			),
		'numero_identificacion',
		'dv',
		'nombre_razon_social',
		// 'direccion',
		/*
		'telefono',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
