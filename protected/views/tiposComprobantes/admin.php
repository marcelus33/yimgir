<br>
<?php
// $this->breadcrumbs=array(
// 	'Tipos Comprobantes'=>array('index'),
// 	'Administrar',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Tipo Comprobante','url'=>array('create')),
);

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// $('.search-form').toggle();
// return false;
// });
// $('.search-form form').submit(function(){
// $.fn.yiiGridView.update('tipos-comprobantes-grid', {
// data: $(this).serialize()
// });
// return false;
// });
// ");
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'tipos-comprobantes-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		// 'id_tipos_comprobantes',
		// 'id_tipos_registros_tc',
		array(
			'name' => 'id_tipos_registros_tc',			
			'header' => 'Tipo de Registro',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idTiposRegistrosTc->tipo_registro_tc)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: left; width: 80px;')
			),
		'tipo_comprobante',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
