<?php
$this->breadcrumbs=array(
	'Timbradoses'=>array('index'),
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
$.fn.yiiGridView.update('timbrados-grid', {
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
'id'=>'timbrados-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_timbrado',
		'id_clientes',
		'numero_timbrado',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
