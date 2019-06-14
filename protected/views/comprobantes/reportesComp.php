<?php

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Nueva Compra','url'=>array('compra')),
array('label'=>'Nueva Venta','url'=>array('venta')),
);
?>
<br>
<?php Yii::app()->clientScript->registerCssFile('/yimgir/css/sweetalert.css');?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/sweetalert.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile('/yimgir/js/exportarDatos.js') ?>

<legend>Comprobantes Registrados</legend>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
							'block' => true,
							'fade' => true,
							'closeText' => '&times;', // false equals no close link
							'events' => array(),
							'htmlOptions' => array(),
							'userComponentId' => 'user',
							'alerts' => array( // configurations per alert type
								'success' => array('closeText' => '&times;'),
								'error' => array('block' => false, 'closeText' => '&times;')
							),
));?>

<div class="form">

<?php echo CHtml::beginForm('excelReport','POST',array('target'=>'' )); ?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Exportar Comprobantes',
        'headerIcon' => 'icon-list-alt', //icon-user icon-list-alt icon-tasks
		//'htmlOptions' => array('class' => 'bootstrap-widget-table')
    )
);?>
<div class = "row-fluid">
    <div class="span 2">
        <label>Tipo de Registro</label>
        <?php
            $name = "mySelect";
            $options = array('1' => 'General', '2' => 'Compras', '3' => 'Ventas'); 
            echo CHtml::dropDownList('mySelect', '1', $options);
        ?>
    </div>
    <div class = "span2">
    <?php echo CHtml::label('Desde','fecha_desde');?>  
    <?php
        $this->widget(
            'bootstrap.widgets.TbDatePicker',
            array(
                'name' => 'fecha_desde',
                'htmlOptions'=> array('id' => 'fecha_desde', 'class'=>'input-small',),
                'options'=> 
                            array(
                                'weekStart' => 1,
                                'format'=> "dd-mm-yyyy",
                                //'orientation'=> "bottom right",
                                'autoclose'=> true,
                                'language' => 'es',
                                
                            ),
                    )
            );?>
    </div>
    <div class = "span2">
    <?php echo CHtml::label('Hasta','fecha_hasta');?>  
  <?php
    $this->widget(
        'bootstrap.widgets.TbDatePicker',
        array(
            'name' => 'fecha_hasta',
            'htmlOptions'=> array('id' => 'fecha_hasta', 'class'=>'input-small',),
            'options'=> 
                        array(
                            'weekStart' => 1,
                            'format'=> "dd-mm-yyyy",
                            //'orientation'=> "bottom right",
                            'autoclose'=> true,
                        ),
                   )
        );?>
    </div>
    <div style = "padding-top: 25px;">
    <?php
        $this->widget(
            'bootstrap.widgets.TbButtonGroup',
            array(
                'type' => 'primary',
                // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'buttons' => array(
                    array('label' => 'Exportar', 'url' => ''),
                    array(
                        'items' => array(
                            array('label' => 'Archivo TXT', 'url' => '', 'itemOptions' => array('id'=>'opcionTxt')),
                            array('label' => 'Archivo Excel', 'url' => '', 'itemOptions' => array('id'=>'opcionExcel')),
                        )
                    ),
                ),
            )
        );
    ?>
    </div>
    </div>    


<?php $this->endWidget(); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'id'=>'enviarFechas',
	'type'=>'primary',
    'label'=>'',
    'htmlOptions'=> array('style' => 'display: none',),
	)); ?>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'comprobantes-grid',
'enableSorting' => false,
'summaryText' => false,
// 'hideHeader' => true,
'dataProvider'=>$dataProvider,
// 'filter'=>$model,
'columns'=>array(
		// 'id_comprobantes',
        // 'id_clientes',
        array(
            'name' => 'id_tipo_registro',			
            'header' => 'Tipo Registro',			
            'type' => 'text', 
            'value' => 'CHtml::encode($data->idTipoRegistro->tipo_registro)',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ),
        array(
			'name' => 'id_clientes',			
			'header' => 'Identificacion',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idClientes->numero_identificacion)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ),
        array(
			'name' => 'id_tipos_comprobantes',			
			'header' => 'Tipo Comprobante',			
			'type' => 'text', 
			'value' => 'CHtml::encode($data->idTiposComprobantes->tipo_comprobante)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: center; width: 100px;')
            ), 
        'numero_comprobante', 
        'fecha_expedicion',
        array(
            'name' => 'id_timbrado',			
            'header' => 'Timbrado',			
            'type' => 'text', 
            'value'=>'$data->idTimbrado==null ? "" : $data->idTimbrado->numero_timbrado',
            'headerHtmlOptions'=>array('style' => 'text-align: center;'),
            'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
        ),
        array(
			'name' => 'total_importe',			
			'header' => 'Total Importe',			
			'type' => 'text', 
			'value'=>'Yii::app()->numberFormatter->formatDecimal($data->total_importe, 0)',
			'headerHtmlOptions'=>array('style' => 'text-align: center;'),
			'htmlOptions'=>array('style' => 'text-align: right; width: 100px;')
		),
        // 'id_timbrado',  
		//'total_importe',
		'ircp',
		'iva_general',
),
)); ?>
