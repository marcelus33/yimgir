<?php
$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Mision','url'=>array('create')),
);
?>
<br>
<?php Yii::app()->clientScript->registerCssFile('/yimgir/js/tableExport/css/tableexport.min.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/js-xlsx/xlsx.core.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/blob.js/Blob.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/fileSaver/FileSaver.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/tableExport/js/tableexport.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/exportarDatos.js') ?>

<legend>Misiones Diplomaticas</legend>
<div id=paraExportar>
	<button id="exportButton" class="btn btn-primary">Exportar Datos</button>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'misiones-diplomaticas-grid',
'hideHeader'=>true,
'dataProvider'=>$model->search(),
'summaryText' => '',
'filter'=>$model,
'columns'=>array(
		// 'id_misiones_diplomaticas',
		'mision_diplomatica',
// array(
// 'class'=>'bootstrap.widgets.TbButtonColumn',
// ),
),
)); ?>


