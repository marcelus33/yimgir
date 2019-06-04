<br>
<?php
// $this->breadcrumbs=array(
// 	'Clientes'=>array('index'),
// 	'Administrar',
// );

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nuevo Cliente','url'=>array('create')),
);

?>

<legend>Buscar Clientes</legend>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'clientes-grid',
'enableSorting' =>false,
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		/*array(
			'name' => 'id_documentos_identificacion',			
			'header' => 'Documento Identificacion',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idDocumentosIdentificacion->documento_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: left; width: 100px;')
		),*/
		array(
			'name' => 'nombre_razon_social',			
			'header' => 'Nombre Razon Social',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->nombre_razon_social)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: left; width: 400px;')
		),
		array(
			'name' => 'numero_identificacion',			
			'header' => 'Numero Identificacion',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->numero_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 50px;')
		),
		array(
			'name' => 'dv',			
			'header' => 'DV',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->dv)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 30px;')
		),
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
