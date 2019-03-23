<?php 
	/* formulario comun para create y update
	
		argumento:
		
		$model: instancia de CrugeAuthItemEditor
	*/
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'authitem-form',
    'type'=>'vertical',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
	<div class='span8'>
		<?php echo $form->textFieldRow($model,'name',array('size'=>64,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class='span8'>
		<?php echo $form->textFieldRow($model,'description',array('size'=>50,'maxlength'=>100, 'class'=>'input-xlarge')); ?>
		<?php echo $form->error($model,'description'); ?>
		<?php if($model->categoria  == "tarea") { ?>
		<div class='hint'>Tip: precede este valor con un ":" para que la tarea sea exportada como un menuitem al usar<br/> <span class='code'>
		Yii::app()->user->rbac->getMenu();</span> y finalizala con un {nombremenuitem} para que quede dentro de un -nombremenuitem-.
		ejemplo: <span class='code'>":Edita tu Perfil{menuprincipal}"</span></div>
		<?php } ?>
	</div>
	<div class='span5'>
		<?php echo $form->textFieldRow($model,'businessRule',array('size'=>50,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'businessRule'); ?>

<div class="form-actions">
	<?php Yii::app()->user->ui->tbutton(($model->isNewRecord ? 'Crear Nuevo' : 'Actualizar'), 'ht'); ?>
	<?php Yii::app()->user->ui->bbutton("Volver",'volver'); ?>
</div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>

