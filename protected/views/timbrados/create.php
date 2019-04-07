<br>
<?php
// $this->breadcrumbs=array(
// 	'Timbradoses'=>array('index'),
// 	'Nuevo',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>
<div class="page-header">
  <h1>Nuevo Timbrado</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>