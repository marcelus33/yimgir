<br>
<?php
// $this->breadcrumbs=array(
// 	'Clientes'=>array('index'),
// 	'Nuevo',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Nuevo Cliente</h2>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>