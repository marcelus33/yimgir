<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'timbrados-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/busquedaclientes.js') ?>

<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->hiddenField($model,'id_clientes',array()); ?>
		<div class="span2">
			<label>Numero de Identificacion <span class="required">*</span></label>
			<input type='text' id='Busqueda_Numero_Identificacion' class='input-medium'
			value="<?php if ( isset($_POST['busqueda_numero_identificacion']) ) 
			echo $_POST['busqueda_numero_identificacion']; 
			else if (isset($model->idClientes->numero_identificacion)) 
					echo $model->idClientes->numero_identificacion ?>">
		
			<?php echo $form->textFieldRow($model,'numero_timbrado',array('class'=>'input-medium')); ?>
					
		</div>
		<div class="span1">
			<label>DV</label
			><input type='text' id='DV' style="width: 30px" 
			value="<?php if ( isset($_POST['dv']) ) 
							echo $_POST['dv']; 
							else if (isset($model->idClientes->dv)) 
									echo $model->idClientes->dv;?>"
									readonly>
		</div>
		<div class="span5">
			<label>Nombre o Razon Social</label>
			<input type='text' id="Nombre_razon_social" style="width: 350px" 
					value="<?php if ( isset($_POST['nombrerazonsocial']) ) 
									echo $_POST['nombrerazonsocial']; 
									else if (isset($model->idClientes->nombre_razon_social)) 
											echo $model->idClientes->nombre_razon_social;?>" 
											readonly/>
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
