<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'comprobantes-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/jquery-mask.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/mask.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/tousan.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/busquedaclientes.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/switch_comprobantes.js') ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_comprobantes',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'id_tipo_registro'); ?> 
	<?php echo $form->hiddenField($model,'id_tipo_registro'); ?>
	<!--<div class="span3">-->	
	<?php //echo $form->labelEx($model,'id_tipo_registro'); ?> 
    <?php //echo $form->dropDownList($model,'id_tipo_registro',
		//CHtml::listData(TiposRegistros::model()->findAll(), 'id_tipo_registro', 'tipo_registro') ); ?> 
	<!--</div>-->

	<?php

	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => 'primary',
		'toggle' => 'radio',
		'htmlOptions'=> array('id' => 'Group'),
		'buttons' => array(
		array('label'=>'COMPRA'),
		array('label'=>'VENTA'),
		),
	));

	echo "<br><br>";
	?>
	

	<?php //echo $form->textFieldRow($model,'id_tipos_comprobantes',array('class'=>'span5')); ?>
	<!--<div class="span3">-->	
	<?php echo $form->labelEx($model,'id_tipos_comprobantes'); ?> 
    <?php echo $form->dropDownList($model,'id_tipos_comprobantes',
    	CHtml::listData(TiposComprobantes::model()->findAll(), 'id_tipos_comprobantes', 'tipo_comprobante') ); //'curso'),array('empty'=>'Seleccione curso') );?> 
	<!--</div>-->

	<?php echo $form->hiddenField($model,'cruge_user_id',array('class'=>'span5', 'value'=> Yii::app()->user->id)); ?>
	<?php echo $form->hiddenField($model,'id_clientes',array('class'=>'span5')); ?>

	<!-- INICIO busqueda cliente -->
	<div class="row-fluid">
	
		<div class="span2">
			<label>No de Identificacion <span class="required">*</span></label>
			<input type='text' id='Busqueda_Numero_Identificacion' style="width: 130px">
		</div>

		<div class="span1">
			<label>DV</label>
			<input type='text' id='DV' style="width: 30px"  disabled/>
		</div>

		<div class="span3">
			<label>Nombre o Razon Social</label>
			<input type='text' id="Nombre_razon_social" style="width: 300px"  disabled/>
		</div>

	</div>
	<!-- FIN busqueda cliente -->

	<?php //echo $form->textFieldRow($model,'id_timbrado',array('class'=>'span5')); ?>
	<!--div class="span3">	-->
		<?php echo $form->labelEx($model,'id_timbrado'); ?> 
		<?php echo $form->dropDownList($model,'id_timbrado', //agregamos esa condition en el findAll para que devuelva vacio
		CHtml::listData(Timbrados::model()->findAll(array("condition"=>"id_timbrado = 0")), 'id_timbrado', 'numero_timbrado'),
					array('class'=>'input-medium','empty'=>'Seleccione timbrado') ); ?> 
    <!--</div>-->

	
	
	<?php //echo $form->textFieldRow($model,'fecha_expedicion',array('class'=>'span5')); ?>
	<?php $now = date("d-m-Y"); ?>
	<?php echo $form->datepickerRow($model, 'fecha_expedicion',
                            array('hint'=>'Formato dia-mes-año',
                                'prepend'=>'<i class="icon-calendar"></i>',
                                'class'=>'input-medium',
                                'value'=>$now,
                                'options'=>array(
                                'format' => 'dd-mm-yyyy', //'yyyy-mm-dd',
                                'weekStart'=> 1,
                                'todayHighlight'=> true,
                                'todayBtn'=> "linked",
                                'autoclose'=> true,
                                    )
                            )); ?>

	<?php echo $form->textFieldRow($model,'numero_comprobante',array('class'=>'span5','maxlength'=>20)); ?>	
	
	<div class="row-fluid">
		<!--En class se pone "number" porque asi reconoce el js de separador de miles-->
		<div class="span2">
			<?php echo $form->textFieldRow($model,'importe_iva_5',array('class'=>'input-medium number')); ?>
		</div>
		<div class="span2">
			<?php echo $form->textFieldRow($model,'importe_iva_10',array('class'=>'input-medium number')); ?>
		</div>
		<div class="span2">
			<?php echo $form->textFieldRow($model,'importe_exenta',array('class'=>'input-medium number')); ?>
		</div>
		<div class="span2">
			<?php echo $form->textFieldRow($model,'total_importe',array('class'=>'input-medium number')); ?>
		</div>
	</div>

	<?php //echo $form->textFieldRow($model,'ircp',array('class'=>'span5','maxlength'=>1)); ?>

	<!--<div class="span3">-->
		<?php echo $form->labelEx($model,'ircp'); ?>	
		<?php echo $form->dropDownList($model,'ircp', array('S' => 'SI', 'N' => 'NO'), array('class'=>'input-small') ); ?>	
	<!--</div>-->

	<?php //echo $form->textFieldRow($model,'iva_general',array('class'=>'span5','maxlength'=>1)); ?>
	<!--<div class="span3">-->
		<?php echo $form->labelEx($model,'iva_general'); ?>	
		<?php echo $form->dropDownList($model,'iva_general', array('S' => 'SI', 'N' => 'NO'), array('class'=>'input-small') ); ?>	
	<!--</div>-->

	<?php //echo $form->textFieldRow($model,'iva_simplificado',array('class'=>'span5','maxlength'=>1)); ?>
	<!--<div class="span3">-->
		<?php echo $form->labelEx($model,'iva_simplificado'); ?>	
		<?php echo $form->dropDownList($model,'iva_simplificado', array('S' => 'SI', 'N' => 'NO'), array('class'=>'input-small') ); ?>	
	<!--</div>-->

	<?php //echo $form->textFieldRow($model,'id_misiones_diplomaticas',array('class'=>'span5')); ?>
	
	<!--<div class="span3">-->	
	<?php echo $form->labelEx($model,'id_misiones_diplomaticas'); ?> 
    <?php echo $form->dropDownList($model,'id_misiones_diplomaticas',
		CHtml::listData(MisionesDiplomaticas::model()->findAll(), 
									'id_misiones_diplomaticas', 
									'mision_diplomatica'), 
				array('empty'=>'Seleccione elemento')); ?> 
	<!--</div>-->



<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
