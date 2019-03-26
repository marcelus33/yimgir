<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tipos-comprobantes-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->labelEx($model,'id_tipos_registros_tc'); ?> 
    <?php echo $form->dropDownList($model,'id_tipos_registros_tc',
    	CHtml::listData(TiposRegistrosTc::model()->findAll(), 'id_tipos_registros_tc', 'tipo_registro_tc') ); //'curso'),array('empty'=>'Seleccione curso') );?> 
	
<?php echo $form->textFieldRow($model,'tipo_comprobante',array('class'=>'input-large','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear Nuevo' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
