<br>
<?php
// $this->breadcrumbs=array(
// 	'Documentos Identificacions'=>array('index'),
// 	'Administrar',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Documento','url'=>array('create')),
);

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// $('.search-form').toggle();
// return false;
// });
// $('.search-form form').submit(function(){
// $.fn.yiiGridView.update('documentos-identificacion-grid', {
// data: $(this).serialize()
// });
// return false;
// });
// ");
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'documentos-identificacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		// 'id_documentos_identificacion',
		'documento_identificacion',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
