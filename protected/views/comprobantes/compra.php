<?php

echo "<br>";

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Nueva Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 
    'id_registro'=>$id_registro)); ?>