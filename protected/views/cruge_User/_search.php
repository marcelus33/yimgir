<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'iduser',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'regdate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'actdate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'logondate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>64)); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>45)); ?>

			<?php echo $form->textFieldRow($model,'authkey',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'state',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'totalsessioncounter',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'currentsessioncounter',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'numero_identificacion_irpc',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
