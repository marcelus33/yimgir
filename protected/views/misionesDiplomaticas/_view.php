<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_misiones_diplomaticas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_misiones_diplomaticas),array('view','id'=>$data->id_misiones_diplomaticas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mision_diplomatica')); ?>:</b>
	<?php echo CHtml::encode($data->mision_diplomatica); ?>
	<br />


</div>