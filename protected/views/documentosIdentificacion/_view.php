<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_documentos_identificacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_documentos_identificacion),array('view','id'=>$data->id_documentos_identificacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('documento_identificacion')); ?>:</b>
	<?php echo CHtml::encode($data->documento_identificacion); ?>
	<br />


</div>