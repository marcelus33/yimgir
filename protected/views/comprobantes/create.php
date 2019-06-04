<?php

echo "<br>";

$this->menu=array(
array('label'=>'Inicio','url'=>array('/')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>