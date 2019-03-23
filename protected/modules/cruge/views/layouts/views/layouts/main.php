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
 'items'=>array(
 array('label'=>'Aviso Legal', 'url'=>array('/site/page', 'view'=>'disclaimer')),
 array('label'=>'Contáctenos', 'url'=>array('/site/contact')),
 array('label'=>'FAQs' , 'url'=>array('/faqs/index'), 'visible'=>!Yii::app()->user->isGuest),
 ),
 ),
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
			 // array('label'=>'Iniciar sesión'
			 // , 'url'=>array('/site/login') //'url'=>Yii::app()->user->ui->loginUrl // reemplazar por lo comentado para login con cruge
			 // , 'visible'=>Yii::app()->user->isGuest), //'visible'=>Yii::app()->user->isGuest), // reemplazar por lo comentado para login con cruge
			 //  array('label'=>'Cerrar sesión ('.Yii::app()->user->name.')'
			 // , 'url'=>array('/site/logout')//'url'=>Yii::app()->user->ui->logoutUrl // reemplazar por lo comentado para login con cruge
			 // , 'visible'=>!Yii::app()->user->isGuest),
			 // // array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
			 // ),
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
 array('label'=>'Definiciones', 'url'=>'#',
 'visible'=>!Yii::app()->user->isGuest,
 'items'=>array(
 array('label'=>'Entidades','url'=>array('/entidades/admin')),
 array('label'=>'Cuentas','url'=>array('#')),
 array('label'=>'Recibos',
 	'items' => array(
						array('label' => 'Ventas',
							'items' => array(
											array('label' => 'Crear Nuevo', 'url'=>$this->createUrl('/recibos/create'),),
											array('label' => 'Procesados', 'url'=>$this->createUrl('/recibos/administrarRecibos'),),
											array('label' => 'Activos o Anulados', 'url'=>$this->createUrl('/recibos/administrarRecibosVacios'),),				
											)
							),
						array('label' => 'Compras', 
							'items' => array(
											array('label' => 'Crear Nuevo', 'url'=>$this->createUrl('/recibos/createCompra'),),
											array('label' => 'Procesados', 'url'=>$this->createUrl('/recibos/administrarRecibosCompra'),),
											array('label' => 'Activos o Anulados', 'url'=>$this->createUrl('/recibos/administrarRecibosVaciosCompra'),),
											)
							),
						)),
 ),
 ),
 array('label'=>'Articulos', 'url'=>array('/articulos/admin'),
 'visible'=>!Yii::app()->user->isGuest,
 'items'=>array(
 array('label'=>'Registrar Articulo','url'=>array('/articulos/create')),
 array('label'=>'Administrar Articulos','url'=>array('/articulos/admin')),
 array(
 		'label'=> 'Marcas', 
 		'items' => array(
						array('label' => 'Registrar Marca', 'url' => array('/marcas/create')),
						array('label' => 'Administrar Marcas', 'url' => array('/marcas/admin')),
						)
		),
 array(
 		'label'=> 'Tallas', 
 		'items' => array(
						array('label' => 'Registrar Talla', 'url' => array('/tallas/create')),
						array('label' => 'Administrar Tallas', 'url' => array('/tallas/admin')),
						)
		),
 array(
 		'label'=> 'Tipos', 
 		'items' => array(
						array('label' => 'Registrar Tipos', 'url' => array('/tipoArticulo/create')),
						array('label' => 'Administrar Tipos', 'url' => array('/tipoArticulo/admin')),
						)
		),
 array(
 		'label'=> 'Categorias', 
 		'items' => array(
						array('label' => 'Registrar Categoria', 'url' => array('/categoriaArticulo/create')),
						array('label' => 'Administrar Categoria', 'url' => array('/categoriaArticulo/admin')),
						)
		)
 ),
 ),

 array('label'=>'Operaciones', 'url'=>'#',
 'visible'=>!Yii::app()->user->isGuest,
 'items'=>array(
 array('label'=>'Fondos','url'=>array('/fondos/admin')),
 array('label'=>'Comprobantes',
 	'items' => array(
						array('label' => 'Ventas',
							'items' => array(
											//array('label' => 'Facturas', 'url' => array('/comprobantes/index')),
											array('label' => 'Facturas', 'url'=>$this->createUrl('/comprobantes/admin'),),
											array('label' => 'Notas de Credito', 'url'=>$this->createUrl('/comprobantes/adminNc'),),
											//array('label' => 'Notas de Debito', 'url'=>$this->createUrl('/comprobantes/index'),),
											//array('label' => 'Notas de Debito', 'url' => array('/comprobanes/view')),
											)
							),
						array('label' => 'Compras', 
							'items' => array(
											//array('label' => 'Facturas', 'url' => array('/comprobantes/indexCompra')),
											array('label' => 'Facturas', 'url'=>$this->createUrl('/comprobantes/adminCompra'),),
											array('label' => 'Notas de Credito', 'url'=>$this->createUrl('/comprobantes/adminNcCompra'),),
											//array('label' => 'Notas de Debito', 'url'=>$this->createUrl('/comprobantes/indexCompra'),),
											//array('label' => 'Notas de Credito', 'url' => array('/comprobantes/index')),
											//array('label' => 'Notas de Debito', 'url' => array('/comprobanes/view')),
											)
							),
						)
 	),
 ),
 ),
 
 array('label'=>'Parámetros', 'url'=>'#',
 'visible'=>!Yii::app()->user->isGuest,
 'items'=>array(
 array('label'=>'Empresa','url'=>array('/entidades/adminEmpresa')),
 array('label'=>'IVA','url'=>array('/tipoiva/admin')),
  //array('label'=>'Cuotas Factura','url'=>array('/cuotasfactura/admin')),
 array('label'=>'Tipo de Valores','url'=>array('/tipodevalores/admin')),
 array('label'=>'Comprobantes',
 				'items' => array(
									array('label'=>'Condicion Factura','url'=>array('/condicionfactura/admin')),
									array('label' => 'Sucursales', 'url'=>$this->createUrl('/nroSucursal/admin'),),
									array('label' => 'Cajas', 'url'=>$this->createUrl('/nroCaja/index'),),
									array('label'=>'Timbrados','url'=>array('/timbrados/admin')),
								)),
 array('label'=>'Estados Comprobantes | Recibos','url'=>array('/tipodevalores/admin')),
 array('label'=>'Talonarios Recibos','url'=>array('/tipodevalores/admin')),
 array('label'=>'Bancos','url'=>array('/bancos/admin')),
 array('label'=>'Departamentos','url'=>array('/departamentos/admin')),
 array('label'=>'Ciudades','url'=>array('/ciudades/admin')),
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
 'url'=>array('/auditoria/admin')
 // , 'visible'=>Yii::app()->user->isSuperAdmin
 ),
 array('label'=>'Usuarios',
 'url'=>array('/usuarios/admin'),
 //'visible'=>!Yii::app()->user->isGuest,
 //'items'=>Yii::app()->user->ui->adminItems ,
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
 <?php echo Yii::app()->user->ui->displayErrorConsole(); ?>  
</body>
</html>