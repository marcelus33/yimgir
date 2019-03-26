<br>
<?php
// $this->breadcrumbs=array(
// 	'Misiones Diplomaticases'=>array('index'),
// 	$model->id_misiones_diplomaticas=>array('view','id'=>$model->id_misiones_diplomaticas),
// 	'Actualizar',
// );

	$this->menu=array(
	array('label'=>'Inicio','url'=>array('/')),
	array('label'=>'Nueva Mision','url'=>array('create')),
	// array('label'=>'Ver','url'=>array('view','id'=>$model->id_misiones_diplomaticas)),
	array('label'=>'Buscar','url'=>array('admin')),
	);
	?>

	
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>