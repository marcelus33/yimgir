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
	 			array('label'=>'Usuarios'
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
 			array('label'=>'Comprobantes',
 				'items' => array(
							array('label' => 'Compras', 'url'=>$this->createUrl('/comprobantes/compra'),),
							array('label' => 'Ventas', 'url'=>$this->createUrl('/comprobantes/venta'),),
							array('label' => 'Administrar', 'url'=>$this->createUrl('/comprobantes/admin'),),
				),
 			),
			array('label'=>'Clientes',
 				'items' => array(
					array('label' => 'Nuevo', 'url'=>$this->createUrl('/clientes/create'),),
					array('label' => 'Administrar', 'url'=>$this->createUrl('/clientes/admin'),),
				 ),
			),
			array('label'=>'Parametros',
				'items'=>array(
					array('label'=>'Timbrados',
						'items' => array(
								array('label' => 'Nuevo', 'url'=>$this->createUrl('/timbrados/create'),),
								array('label' => 'Administrar', 'url'=>$this->createUrl('/timbrados/admin'),),
						),
					),
					array('label'=>'Documentos de Identificacion',
						'items' => array(
								array('label' => 'Nuevo', 'url'=>$this->createUrl('/documentosIdentificacion/create'),),
								array('label' => 'Administrar', 'url'=>$this->createUrl('/documentosIdentificacion/admin'),),
						),
					),
					array('label'=>'Tipos de Comprobantes',
						'items' => array(
								array('label' => 'Nuevo', 'url'=>$this->createUrl('/tiposComprobantes/create'),),
								array('label' => 'Administrar', 'url'=>$this->createUrl('/tiposComprobantes/admin'),),
						),
					),
					array('label'=>'Misiones Diplomaticas',
						'items' => array(
								array('label' => 'Nuevo', 'url'=>$this->createUrl('/misionesDiplomaticas/create'),),
								array('label' => 'Administrar', 'url'=>$this->createUrl('/misionesDiplomaticas/admin'),),
						),
					),
				),
 			),
			array('label'=>'Herramientas', 'url'=>'#',
 				'visible'=>!Yii::app()->user->isGuest,
 				'items'=>array(
 					array('label'=>'Copia de Seguridad',
 						'url'=>array('/backup/default/index')
 						//	'visible'=>!Yii::app()->user->isGuest,
 						//'visible'=>Yii::app()->user->isSuperAdmin,
 					),
 					array('label'=>'Auditoria', 
 						'url'=>array('/activerecordlog/admin')
 						// , 'visible'=>Yii::app()->user->isSuperAdmin
 					),
 				)
			),
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