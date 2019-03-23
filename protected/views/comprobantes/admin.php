<?php
$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Crear Nuevo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('comprobantes-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'comprobantes-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
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
