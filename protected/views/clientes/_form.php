<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'clientes-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/calculodv.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/restric_numeric.js') ?>
<?php
		Yii::app()->clientScript->registerScript(
		'myHideEffect',
		'$(".errorAlert").fadeOut(5000);',
		CClientScript::POS_READY
		);
?>



<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="span-3">
			<?php echo $form->labelEx($model,'id_documentos_identificacion'); ?> 
			<?php echo $form->dropDownList($model,'id_documentos_identificacion',
			CHtml::listData(DocumentosIdentificacion::model()->findAll(), 
						'id_documentos_identificacion', 
						'documento_identificacion'), 
				array('empty'=>'Seleccione elemento')); ?>	
			
		</div>
		<div class="span-3">
				<?php echo $form->textFieldRow($model,'nombre_razon_social',array('style'=>'width: 250px','maxlength'=>250)); ?>
		</div>
		
	</div>
	<div class="row">
		<div class="span-3">
			<?php echo $form->textFieldRow($model,'numero_identificacion',array('class'=>'input-medium number','maxlength'=>30) ); ?>
		</div>
		<div class="span-3">
			<?php echo $form->textFieldRow($model,'dv',array('readonly'=>true,'style'=>'width: 30px')); ?>	
		</div>
	</div>

	<?php $this->widget('bootstrap.widgets.TbAlert', array(
							'block' => true,
							'fade' => true,
							'closeText' => false,//'&times;', // false equals no close link
							'events' => array(),
							'htmlOptions' => array('class' => 'errorAlert'),
							'userComponentId' => 'user',
							'alerts' => array( // configurations per alert type
								// success, info, warning, error or danger
								//'success' => array(), //'closeText' => '&times;'
								//'info', // you don't need to specify full config
								//'warning' => array('block' => false, 'closeText' => 'Cerrar'),
								'error' => array('block' => false)
							),
						));
?>

	<div class="row">
		<div class="span-3">
			<?php echo $form->textFieldRow($model,'direccion',array('style'=>'width: 250px','maxlength'=>100)); ?>
		</div>
		<div class="span-3">
			<?php echo $form->textFieldRow($model,'telefono',array('style'=>'width: 100px')); ?>
		</div>
	</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear Nuevo' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
