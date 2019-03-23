<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipos_registros_tc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipos_registros_tc),array('view','id'=>$data->id_tipos_registros_tc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_registro_tc')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_registro_tc); ?>
	<br />


</div>