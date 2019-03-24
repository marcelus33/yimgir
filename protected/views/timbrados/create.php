<br>
<?php
// $this->breadcrumbs=array(
// 	'Timbradoses'=>array('index'),
// 	'Nuevo',
// );

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>