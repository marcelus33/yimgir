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

<div class="page-header">
  <h1>Nuevo Cliente</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>