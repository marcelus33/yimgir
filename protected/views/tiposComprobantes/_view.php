<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipos_comprobantes')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipos_comprobantes),array('view','id'=>$data->id_tipos_comprobantes)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipos_registros_tc')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipos_registros_tc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_comprobante')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_comprobante); ?>
	<br />


</div>