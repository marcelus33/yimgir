<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Mision','url'=>array('create')),
);
?>
<br>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/exportarDatos.js') ?>

<legend>Misiones Diplomaticas</legend>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
							'block' => true,
							'fade' => true,
							'closeText' => '&times;', // false equals no close link
							'events' => array(),
							'htmlOptions' => array(),
							'userComponentId' => 'user',
							'alerts' => array( // configurations per alert type
								'success' => array('closeText' => '&times;'),
								'error' => array('block' => false, 'closeText' => '&times;')
							),
));?>
<div class = "row-fluid">
<div class = "span2">
<?php
$this->widget('bootstrap.widgets.TbButton',array(
	'label' => 'Exportar TXT',
	'type' => 'primary',
	'size' => 'middle',
	'url' => 'reportesAjax'
));
?>
</div>
<div class = "span2">
<?php
$this->widget('bootstrap.widgets.TbButton',array(
	'label' => 'Exportar Excel',
	'type' => 'primary',
	'size' => 'middle',
	'url' =>'excel',
));
?>
</div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'misiones-diplomaticas-grid',
'hideHeader'=>true,
'dataProvider'=>$model->search(),
'summaryText' => '',
//'filter'=>$model,
'columns'=>array(
		// 'id_misiones_diplomaticas',
		'mision_diplomatica',
// array(
// 'class'=>'bootstrap.widgets.TbButtonColumn',
// ),
),
)); ?>


