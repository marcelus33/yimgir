<?php

echo "<br>";

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Nueva Compra</h2>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
    'id_registro'=>$id_registro, 'contribuyente'=>$contribuyente)); ?>