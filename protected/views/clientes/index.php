<?php
// $this->breadcrumbs=array(
// 	'Clientes',
// );

$this->menu=array(
array('label'=>'Nuevo Cliente','url'=>array('create')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
