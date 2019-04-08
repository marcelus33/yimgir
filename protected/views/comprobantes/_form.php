<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'comprobantes-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php //Yii::app()->clientScript->registerScriptFile('/yimgir/js/jquery-3.3.1.min.js'); ?>
<?php Yii::app()->clientScript->registerCssFile('/yimgir/css/switchCheckBox.css');?>
<?php Yii::app()->clientScript->registerCssFile('/yimgir/css/sweetalert.css');?>
<?php Yii::app()->clientScript->registerCssFile('/yimgir/css/mycss.css');?>

<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/jquery-mask.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/mask.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/tousan.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/busquedaclientes.js') ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/switch_comprobantes.js') ?>
<?php //Yii::app()->clientScript->registerScriptFile('/yimgir/js/bootstrap2-toggle.js');?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/botones_switch.js');  ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/longitud_input.js');  ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/importes_operacion.js');  ?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/sweetalert.min.js');  ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_comprobantes',array('class'=>'span5')); ?>
	<?php //echo $form->labelEx($model,'id_tipo_registro'); ?> 
	<?php echo $form->hiddenField($model,'id_tipo_registro',array('value'=>$id_registro)); ?>
	<!--<div class="span3">-->	
	<?php //echo $form->labelEx($model,'id_tipo_registro'); ?> 
    <?php //echo $form->dropDownList($model,'id_tipo_registro',
		//CHtml::listData(TiposRegistros::model()->findAll(), 'id_tipo_registro', 'tipo_registro') ); ?> 
	<!--</div>-->

<!--IMPUESTOS AFECTADOS POR EL REGISTRO -->
<?php echo $form->hiddenField($model,'ircp',array('class'=>'span5','maxlength'=>1, 'value' => 'S')); ?>

<?php echo $form->hiddenField($model,'iva_general',array('class'=>'span5','maxlength'=>1, 'value' => 'N')); ?>

<?php echo $form->hiddenField($model,'iva_simplificado',array('class'=>'span5','maxlength'=>1, 'value' => 'N')); ?>
<br>

<label for="wellbotones">Impuestos afectados por el registro</label>
<div id ="wellbotones" class="well">

<div class="row-fluid">
	<div class="span2">
		<?php echo CHtml::label('IRPC','boton-irpc'); ?> 
		<label class="switch">
			<input type="checkbox" checked id="boton-irpc" name="boton-irpc">
			<span class="slider round"></span>
		</label>
	</div>
	
	<div class="span2">
		<?php echo CHtml::label('IVA General','boton-ivag'); ?> 
		<label class="switch">
			<input type="checkbox" name="boton-ivag" id="boton-ivag">
			<span class="slider round"></span>
		</label>
	</div>
	<div class="span2">
		<?php echo CHtml::label('IVA Simplificado','boton-ivas'); ?> 
		<label class="switch">
			<input type="checkbox"name="boton-ivas" id="boton-ivas">
			<span class="slider round"></span>
		</label>
		
	</div>
</div>
	
</div>

<?php echo $form->hiddenField($model,'cruge_user_id',array('class'=>'span5', 'value'=> Yii::app()->user->id)); ?>
	<?php echo $form->hiddenField($model,'id_clientes',array('class'=>'span5' )); //, 'value'=>""?>

	<!-- INICIO busqueda cliente -->
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Datos del '.$contribuyente,
        'headerIcon' => 'icon-user', //icon-user icon-list-alt icon-tasks
		//'htmlOptions' => array('class' => 'bootstrap-widget-table')
    )
);?>
	<div class="row-fluid">
	
		<div class="span2">
			<label>No de Identificacion <span class="required">*</span></label>
			<input type='text' name='busqueda_numero_identificacion' 
			id='Busqueda_Numero_Identificacion' style="width: 130px" 
			value="<?php if ( isset($_POST['busqueda_numero_identificacion']) ) 
			echo $_POST['busqueda_numero_identificacion']; else if (isset($model->idClientes->numero_identificacion)) echo $model->idClientes->numero_identificacion ?>">
		</div>

		<div class="span1">
			<label>DV</label>
			<input type='text' name ='dv' id='DV' style="width: 30px" 
			value="<?php if ( isset($_POST['dv']) ) echo $_POST['dv']; else if (isset($model->idClientes->dv)) echo $model->idClientes->dv?>" readonly/>
		</div>
	
		<div class="span3">
			<label>Nombre o Razon Social</label>
			<input type='text' name ='nombrerazonsocial' id="Nombre_razon_social" style="width: 300px" 
			value="<?php if ( isset($_POST['nombrerazonsocial']) ) echo $_POST['nombrerazonsocial']; else if (isset($model->idClientes->nombre_razon_social)) echo $model->idClientes->nombre_razon_social?>" readonly/>
		</div>

	</div>
	<!-- FIN busqueda cliente -->
<?php $this->endWidget(); ?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Datos del Comprobante',
        'headerIcon' => 'icon-list-alt', //icon-user icon-list-alt icon-tasks
		//'htmlOptions' => array('class' => 'bootstrap-widget-table')
    )
);?>

<div class="row-fluid">
  <div class="span10">
    <!--principal-->
		<div class="row-fluid">
				  <div class="span5">

			<?php //echo $form->textFieldRow($model,'id_tipos_comprobantes',array('class'=>'span5')); ?>
					<!--<div class="span3">-->	
					<?php echo $form->labelEx($model,'id_tipos_comprobantes'); ?> 
					<?php echo $form->dropDownList($model,'id_tipos_comprobantes',
						CHtml::listData(TiposComprobantes::model()->findAll(), 'id_tipos_comprobantes', 'tipo_comprobante') ); //'curso'),array('empty'=>'Seleccione curso') );?> 
					<!--</div>-->
					<?php //echo $form->textFieldRow($model,'id_timbrado',array('class'=>'span5')); ?>
					<div id="timbradoDiv">
						<?php echo $form->labelEx($model,'id_timbrado'); ?> 
						<?php echo $form->dropDownList($model,'id_timbrado', //agregamos esa condition en el findAll para que devuelva vacio
						CHtml::listData(Timbrados::model()->findAll(array("condition"=>"id_timbrado = 0")), 'id_timbrado', 'numero_timbrado'),
									array('class'=>'input-medium','empty'=>'Seleccione timbrado') ); ?> 
					</div>

				  </div>
				  
				 <div class="span5">
				 <?php //echo $form->textFieldRow($model,'fecha_expedicion',array('class'=>'span5')); ?>
				  <?php $now = date("d-m-Y"); ?>
				  <?php echo $form->datepickerRow($model, 'fecha_expedicion',
										array(//'hint'=>'Formato dia-mes-año',
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
				
				 	

					<?php echo $form->textFieldRow($model,'numero_comprobante',array('maxlength'=>20)); ?>
					
				</div>
		</div>
  </div>
</div>
<?php $this->endWidget(); ?>
	

					<?php $this->widget('bootstrap.widgets.TbAlert', array(
							'block' => true,
							'fade' => true,
							'closeText' => '&times;', // false equals no close link
							'events' => array(),
							'htmlOptions' => array(),
							'userComponentId' => 'user',
							'alerts' => array( // configurations per alert type
								// success, info, warning, error or danger
								//'success' => array('closeText' => '&times;'),
								//'info', // you don't need to specify full config
								'warning' => array('block' => false, 'closeText' => 'Cerrar'),
								'error' => array('block' => false, 'closeText' => 'Cerrar')
							),
						));?>
	

	
<!--<div id ="numeros"  class="well">-->
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Importes de la Operación',
        'headerIcon' => 'icon-tasks', //icon-user icon-list-alt icon-tasks
		//'htmlOptions' => array('class' => 'bootstrap-widget-table')
    )
);?>
	<div class="row-fluid">
		<!--En class se pone "number" porque asi reconoce el js de separador de miles-->
		<div class="span10"> 
			<div class="row-fluid">

				<div class="span5">
				<?php echo $form->textFieldRow($model,'importe_iva_10',array('class'=>'input-medium number')); ?>

				<?php echo $form->textFieldRow($model,'importe_iva_5',array('class'=>'input-medium number')); ?>				

				<?php echo $form->textFieldRow($model,'importe_exenta',array('class'=>'input-medium number')); ?>

				<?php echo $form->textFieldRow($model,'total_importe',array('class'=>'input-medium number', 'readOnly'=>true)); ?>
				</div>

				<div class="span5">
					<label for="calc_iva10">IVA %10</label>
					<input type="text" name="calc_iva10" id="calc_iva10" class="input-medium number" disabled><br>
					<label for="calc_iva5">IVA %5</label>
					<input type="text" name="calc_iva5" id="calc_iva5" class="input-medium number" disabled><br>
					<label for="calc_total">Total IVA</label>
					<input type="text" name="calc_total" id="calc_total" class="input-medium number" disabled><br>
					<label for="calc_siniva">Total Importe sin IVA</label>
					<input type="text" name="calc_siniva" id="calc_siniva" class="input-medium number" disabled><br>

				</div>

			</div>
		</div>		
	</div>
<!--</div>-->
<?php $this->endWidget(); ?>
		
	<?php echo $form->labelEx($model,'id_misiones_diplomaticas'); ?> 
	<div id ="wellbotones" class="well">
	<?php //echo $form->textFieldRow($model,'id_misiones_diplomaticas',array('class'=>'span5')); ?>
	
	<!--<div class="span3">-->	
	<?php //echo $form->labelEx($model,'id_misiones_diplomaticas'); ?> 
    <?php echo $form->dropDownList($model,'id_misiones_diplomaticas',
		CHtml::listData(MisionesDiplomaticas::model()->findAll(), 
									'id_misiones_diplomaticas', 
									'mision_diplomatica'), 
				array('empty'=>'Seleccione elemento')); ?> 
	<!--</div>-->
	</div>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Guardar y Continuar',
		)); ?>

<?php //$currentAction = Yii::app()->urlManager->parseUrl(Yii::app()->request);?>
	
<?php //echo CHtml::button('Guardar y Continuar', array('submit' => array( $currentAction ))); ?>

</div>

<?php $this->endWidget(); ?>
