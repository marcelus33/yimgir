<br>
<?php
// $this->breadcrumbs=array(
// 	'Misiones Diplomaticases'=>array('index'),
// 	'Administrar',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Mision','url'=>array('create')),
);

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// $('.search-form').toggle();
// return false;
// });
// $('.search-form form').submit(function(){
// $.fn.yiiGridView.update('misiones-diplomaticas-grid', {
// data: $(this).serialize()
// });
// return false;
// });
// ");
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'misiones-diplomaticas-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		// 'id_misiones_diplomaticas',
		'mision_diplomatica',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
