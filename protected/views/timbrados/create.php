<br>
<?php
// $this->breadcrumbs=array(
// 	'Timbradoses'=>array('index'),
// 	'Nuevo',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>
<div class="page-header">
  <h2>Nuevo Timbrado</h2>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>