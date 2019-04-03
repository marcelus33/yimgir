<?php
$this->menu=array(
    array('label'=>'Inicio','url'=>array('/')),
    array('label'=>'Buscar','url'=>array('admin')),
);
?>
<?php Yii::app()->clientScript->registerCssFile('/yimgir/js/tableExport/css/tableexport.min.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/js-xlsx/xlsx.core.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/blob.js/Blob.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/fileSaver/FileSaver.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/tableExport/js/tableexport.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/exportarDatos.js') ?>

<h1>Reporte de Misiones Diplomaticas</h1>
<br>
<div class="form">

<?php echo CHtml::beginForm('reportes','POST',array('target'=>'_blank' )); ?>
<div class="span-3">
        <!-- <label>Numero de Identificacion</label><input name="numero_identificacion" id="numero_identificacion" type="text" style="width: 90px;"/>  -->
</div>
    

   
 <?php //print_r($_POST); ?>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->
<div >
    	<button id="generarTabla" class="btn btn-primary">Exportar Datos</button>
</div>