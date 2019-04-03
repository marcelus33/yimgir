<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'misiones-diplomaticas-grid',
'hideHeader'=>true,
'dataProvider'=>$dataProvider,
'summaryText' => '',
//'filter'=>$model,
'columns'=>array(
		// 'id_misiones_diplomaticas',
		'mision_diplomatica',
// array(
// 'class'=>'bootstrap.widgets.TbButtonColumn',
// ),
),
)); ?>