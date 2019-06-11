<?php $this->layout='//layouts/column1'; //column_login ?>
<div id="login-content" style='width: 40%; float: left;' >

<h1 style="text-align:center;" >Iniciar sesión</h1>

<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>

<?php else: ?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'htmlOptions'=>array('class'=>'well', 'style'=>'width:85%; text-align:center;'), //, 'style'=>'width:50%; margin: 0 auto; text-align:center;'
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->passwordFieldRow($model,'password'); ?>
		<?php //echo $form->checkBoxRow($model,'rememberMe'); ?>
		<br>	
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login', 'htmlOptions'=>array('class'=>'btn btn-primary', 'style'=>'padding: 10px 20px;'))); //margin: 0 auto auto 20%; ?>
		<?php //echo Yii::app()->user->ui->passwordRecoveryLink; ?>
		<?php
			/*if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
				echo Yii::app()->user->ui->registrationLink;*/
		?>

	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	


<?php $this->endWidget(); ?>
<?php endif; ?>

</div>

<?php
	    	$sql = 'select clientes.nombre_razon_social as nrs, 
					clientes.numero_identificacion as ni, 
					cruge_user.username as un
						from cruge_user, clientes
						where cruge_user.numero_identificacion_irpc = clientes.numero_identificacion';
		
			$rawData = Yii::app()->db->createCommand($sql); //or use ->queryAll(); in CArrayDataProvider
			$count = Yii::app()->db->createCommand('select COUNT(*) from (' . $sql . ') as count_alias')->queryScalar(); //the count
						
			$dataProvider = new CSqlDataProvider($rawData, array( 
                    'keyField' => 'ni', 
                    'totalItemCount' => $count,
                    'pagination' => false,
                    )
                );


?>

<div style="width: 45%; height: 300px; overflow-y: scroll; float: right;"> <!--width: 45%;-->
<h1 style="text-align:center;">Clientes Usuarios</h1>
<p style="text-align:center;"><b><i>Favor seleccione un usuario para ingresar</i></b></p>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'cruge--user-grid',
'dataProvider'=>$dataProvider,
'enableSorting' =>false,
'summaryText' => false,
'htmlOptions'=> array('style'=>'', 'class'=>'well'),
'columns'=>array(

		array(
			'name' => 'nrs',			
			'header' => 'Nombre',			
			'type' => 'text', 
			'value' => 'ucwords( strtolower( $data["nrs"] ) )', 
			),
		array(
			'name' => 'ni',			
			'header' => 'Nro Doc',			
			'type' => 'text', 
			'value' => '$data["ni"]',
				),
		array(
			'name' => 'un',			
			'header' => 'Usuario',			
			'type' => 'text', 
			'value' => '$data["un"]',
			'htmlOptions'=>array('class' => 'userno')
			),

),
)); ?>

</div>

<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/paste_login_username.js', CClientScript::POS_END) ?>