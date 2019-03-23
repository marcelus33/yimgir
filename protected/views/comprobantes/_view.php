<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_comprobantes')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_comprobantes),array('view','id'=>$data->id_comprobantes)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clientes')); ?>:</b>
	<?php echo CHtml::encode($data->id_clientes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipos_comprobantes')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipos_comprobantes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_registro')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_timbrado')); ?>:</b>
	<?php echo CHtml::encode($data->id_timbrado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_misiones_diplomaticas')); ?>:</b>
	<?php echo CHtml::encode($data->id_misiones_diplomaticas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_expedicion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_expedicion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->numero_comprobante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe_iva_5')); ?>:</b>
	<?php echo CHtml::encode($data->importe_iva_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe_iva_10')); ?>:</b>
	<?php echo CHtml::encode($data->importe_iva_10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe_exenta')); ?>:</b>
	<?php echo CHtml::encode($data->importe_exenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_importe')); ?>:</b>
	<?php echo CHtml::encode($data->total_importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ircp')); ?>:</b>
	<?php echo CHtml::encode($data->ircp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva_general')); ?>:</b>
	<?php echo CHtml::encode($data->iva_general); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva_simplificado')); ?>:</b>
	<?php echo CHtml::encode($data->iva_simplificado); ?>
	<br />

	*/ ?>

</div>