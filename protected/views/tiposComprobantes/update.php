<br>
<?php
// $this->breadcrumbs=array(
// 	'Tipos Comprobantes'=>array('index'),
// 	$model->id_tipos_comprobantes=>array('view','id'=>$model->id_tipos_comprobantes),
// 	'Actualizar',
// );

	$this->menu=array(
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Nuevo Tipo Comprobante','url'=>array('create')),
	// array('label'=>'Ver','url'=>array('view','id'=>$model->id_tipos_comprobantes)),
	array('label'=>'Buscar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>