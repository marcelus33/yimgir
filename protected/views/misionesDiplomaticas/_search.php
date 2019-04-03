<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/exportarDatos.js') ?>
		<?php echo $form->textFieldRow($model,'id_misiones_diplomaticas',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'mision_diplomatica',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
