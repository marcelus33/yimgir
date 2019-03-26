<br>
<?php
// $this->breadcrumbs=array(
// 	'Clientes'=>array('index'),
// 	'Nuevo',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>