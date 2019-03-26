<br>
<?php
// $this->breadcrumbs=array(
// 	'Documentos Identificacions',
// );

$this->menu=array(
array('label'=>'Nuevo Documento','url'=>array('create')),
array('label'=>'Buscar','url'=>array('admin')),
);
?>

<h1>Documentos Identificacions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
