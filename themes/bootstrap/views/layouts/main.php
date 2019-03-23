<!DOCTYPE html>
 
<html lang="<?php echo Yii::app()->language;?>">
 
<head>
 
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
 
 <meta charset="<?php echo Yii::app()->charset;?>">
 
</head>
<br/><br/>
<body>
 
<header>
<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
 //'type'=>'inverse', // null or 'inverse'
 'brand'=>CHtml::encode(Yii::app()->name),
 'brandUrl'=>array('/site/index'),
 'fixed' => 'bottom',
 //'collapse'=>true, // requires bootstrap-responsive.css
 'items'=>array(
 array(
 'class'=>'bootstrap.widgets.TbMenu',
 'htmlOptions'=>array('class'=>'pull-right'),
 'items'=>array(
	 			array('label'=>'Administrar Usuarios'
					, 'url'=>Yii::app()->user->ui->userManagementAdminUrl
					, 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Login'
					, 'url'=>Yii::app()->user->ui->loginUrl
					, 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')'
					, 'url'=>Yii::app()->user->ui->logoutUrl
					, 'visible'=>!Yii::app()->user->isGuest),
					),
 ),
 ),
));
?>
 
<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
 'type'=>'null',
 //'collapse'=>true,
 'items'=>array(
 array(
 'class'=>'bootstrap.widgets.TbMenu',
 'items'=>array(
 array('label'=>'Inicio', 'url'=>array('/site')),
 array('label'=>'Entidades',
 	'items' => array(
				array('label' => 'Nuevo', 'url'=>$this->createUrl('/entidades/create'),),
				array('label' => 'Administrar', 'url'=>$this->createUrl('/entidades/admin'),),
				),
 	),
   array('label'=>'Recibos',
 	'items' => array(
					array('label' => 'Nuevo', 'url'=>$this->createUrl('/recibos/create'),),
					array('label' => 'Administrar', 'url'=>$this->createUrl('/recibos/administrarRecibos'),),


 ),
 ),

array('label'=>'Sistema', 'url'=>'#',
 'visible'=>!Yii::app()->user->isGuest,
 'items'=>array(
 	array('label'=>'Backups',
 	'url'=>array('/backup/default/index')
 	//	'visible'=>!Yii::app()->user->isGuest,
 	//'visible'=>Yii::app()->user->isSuperAdmin,
 	),
 array('label'=>'Auditoria', 
 'url'=>array('/activerecordlog/admin')
 // , 'visible'=>Yii::app()->user->isSuperAdmin
 ),
 )),
 
 ),
))));
?>
</header>
<div class="container" id="main">
 <?php if(isset($this->breadcrumbs)):?>
 <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 'links'=>$this->breadcrumbs,
 )); ?>
 <?php endif?>
 <?php echo $content; ?>
 <hr>
</div>
</body>
</html>