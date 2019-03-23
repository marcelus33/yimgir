<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_registro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_registro),array('view','id'=>$data->id_tipo_registro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_registro')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_registro); ?>
	<br />


</div>