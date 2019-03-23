<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_timbrado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_timbrado),array('view','id'=>$data->id_timbrado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clientes')); ?>:</b>
	<?php echo CHtml::encode($data->id_clientes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_timbrado')); ?>:</b>
	<?php echo CHtml::encode($data->numero_timbrado); ?>
	<br />


</div>