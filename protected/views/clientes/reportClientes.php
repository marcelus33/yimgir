<?php
$this->menu=array(
    array('label'=>'Inicio','url'=>array('/')),
    array('label'=>'Buscar','url'=>array('admin')),
);
?>

<h1>Busqueda de Clientes</h1>
<br>
<div class="form">

<?php echo CHtml::beginForm('reportClientes','POST',array('target'=>'_blank' )); ?>
<div class="span-3">
        <label>Numero de Identificacion</label><input name="numero_identificacion" id="numero_identificacion" type="text" style="width: 90px;"/> 
</div>
    <div class="form-actions">
        <?php //echo CHtml::Button('Generar reporte',array('id'=>'boton')); ?>
        <?php //echo CHtml::Button('Generar',array('id'=>'reporte','submit'=>'ReporteRevaluoInforme')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'id'=>'reporte',
			//'submit'=>'ReporteRevaluoInforme',
			'type'=>'primary',
			'label'=>'Generar Excel',
		)); ?>
    </div>

   
 <?php //print_r($_POST); ?>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->