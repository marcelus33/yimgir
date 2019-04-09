<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cruge--user-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'regdate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'actdate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'logondate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'authkey',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'totalsessioncounter',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'currentsessioncounter',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'numero_identificacion_irpc',array('class'=>'span5','maxlength'=>20)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear Nuevo' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
