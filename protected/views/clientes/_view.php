<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_clientes')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_clientes),array('view','id'=>$data->id_clientes)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_documentos_identificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_documentos_identificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_identificacion')); ?>:</b>
	<?php echo CHtml::encode($data->numero_identificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dv')); ?>:</b>
	<?php echo CHtml::encode($data->dv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />


</div>