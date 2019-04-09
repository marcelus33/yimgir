<?php
// $this->breadcrumbs=array(
// 	'Timbradoses'=>array('index'),
// 	'Administrar',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Crear Nuevo','url'=>array('create')),
);


?>

<div class="page-header">
  <h1>Buscar Timbrados</h1>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'timbrados-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_timbrado',
		//'id_clientes',
		array (
			'header' =>'Cliente',
			'name'=>'id_clientes', 
			'value'=>'$data->idClientes->nombre_razon_social',
			'type'=>'text',
		),
		'numero_timbrado',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
