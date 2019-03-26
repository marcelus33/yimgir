<br>
<?php
// $this->breadcrumbs=array(
// 	'Misiones Diplomaticases'=>array('index'),
// 	$model->id_misiones_diplomaticas,
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Mision','url'=>array('create')),
array('label'=>'Editar','url'=>array('update','id'=>$model->id_misiones_diplomaticas)),
array('label'=>'Eliminar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_misiones_diplomaticas),'confirm'=>'¿Está usted seguro de que desea eliminar éste registro?')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>


<?php 
// $this->widget('bootstrap.widgets.TbDetailView',array(
// 'data'=>$model,
// 'attributes'=>array(
// 		'id_misiones_diplomaticas',
// 		'mision_diplomatica',
// ),
// )); 
?>

<legend>Mision Diplomatica</legend>
	<label style="font-size: 16px;"><b>Mision Diplomatica: </b><?php echo $model->mision_diplomatica;?></label>