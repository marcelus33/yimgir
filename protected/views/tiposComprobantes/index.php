<br>
<?php
// $this->breadcrumbs=array(
// 	'Tipos Comprobantes',
// );

$this->menu=array(
array('label'=>'Nuevo Tipo Comprobante','url'=>array('create')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>

<h1>Tipos Comprobantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
