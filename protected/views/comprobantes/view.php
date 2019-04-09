<?php

echo "<br>";

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Compra','url'=>array('compra')),
array('label'=>'Nueva Venta','url'=>array('venta')),
array('label'=>'Editar','url'=>array(($model->id_tipo_registro == 1 ?"compraUpdate":"ventaUpdate"),'id'=>$model->id_comprobantes)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_comprobantes),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>
<legend>Comprobante</legend>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Datos del Contribuyente',
        'headerIcon' => 'icon-user', //icon-user icon-list-alt icon-tasks
    )
);?>
	<div class="row-fluid">
		<div class ="span3">
			<label><b>Tipo Identificacion: </b><?php echo $model->idClientes->idDocumentosIdentificacion->documento_identificacion;?></label>	
		</div>
		<div class="span3">
			<label><b>Numero Identificacion: </b><?php echo $model->idClientes->numero_identificacion;?></label>
		</div>
		<div class="span1">
			<label><b>DV: </b><?php echo $model->idClientes->dv;?></label>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span5">
			<label style = "width: 500px;"><b>Nombre Razon: </b><?php echo $model->idClientes->nombre_razon_social;?></label>
		</div>
	</div>
	<!-- FIN busqueda cliente -->
<?php $this->endWidget(); ?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Datos del Comprobante',
        'headerIcon' => 'icon-list-alt', //icon-user icon-list-alt icon-tasks
    )
);?>

<div class="row-fluid">
  <div class="span10">
    <div class = "row-fluid">
	<div class="span5">
		<label><b>Tipo Registro: </b><?php echo $model->idTipoRegistro->tipo_registro;?></label>
	</div>
	<div class="span4">
		<label><b>Tipo Comprobante: </b><?php echo $model->idTiposComprobantes->tipo_comprobante;?></label>
	</div>	
</div>
<legend></legend>
		<div class="row-fluid">
			<div class="span5">
			 	<label><b>Numero Comprobante: </b><?php echo $model->numero_comprobante;?></label>			 		
			</div>
			<div class="span4">
				<label ><b>Fecha Expedicion: </b><?php echo date("d/m/Y", strtotime(CHtml::encode($model->fecha_expedicion)))?></label>
			</div>
			<div class="span3">
				<label><b>Timbrado: </b><?php if (isset($model->idTimbrado->numero_timbrado)) echo $model->idTimbrado->numero_timbrado;?></label>
			</div>
		</div>
		<legend></legend>
		<div class= "row-fluid">
			<div class ="span4">
					<label><b>Importe IVA 10: </b><?php echo Yii::app()->numberFormatter->formatDecimal($model->importe_iva_10, 0);?></label>
					<label><b>Importe IVA 5: </b><?php echo Yii::app()->numberFormatter->formatDecimal($model->importe_iva_5, 0);?></label>
					<label><b>Importe Exenta: </b><?php echo Yii::app()->numberFormatter->formatDecimal($model->importe_exenta, 0);?></label>
					<label><b>Total Importe: </b><?php echo Yii::app()->numberFormatter->formatDecimal($model->total_importe, 0);?></label>
			</div>
  		</div>
		<legend></legend>
		<div class="row-fluid">
				<div class="span5">
					<label><b>IRPC: </b><?php echo $model->ircp;?></label>
				</div>
				<div class="span4">
					<label><b>IVA General: </b><?php echo $model->iva_general;?></label>
				</div>
				<div class="span3">
					<label><b>IVA Simplificado: </b><?php echo $model->iva_simplificado;?></label>
				</div>
			</div>
		</div>
</div>
<?php $this->endWidget(); ?>
