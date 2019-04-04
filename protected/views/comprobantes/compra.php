<?php

echo "<br>";

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<div class="page-header">
  <h1>Nueva Compra</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
    'id_registro'=>$id_registro, 'contribuyente'=>$contribuyente)); ?>