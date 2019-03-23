<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'comprobantes-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_comprobantes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_clientes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_tipos_comprobantes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_tipo_registro',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_timbrado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_misiones_diplomaticas',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_expedicion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'numero_comprobante',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'importe_iva_5',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'importe_iva_10',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'importe_exenta',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'total_importe',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ircp',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'iva_general',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'iva_simplificado',array('class'=>'span5','maxlength'=>1)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear Nuevo' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
