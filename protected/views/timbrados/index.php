<?php
$this->breadcrumbs=array(
	'Timbradoses',
);

$this->menu=array(
array('label'=>'Crear Nuevo','url'=>array('create')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Timbradoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
