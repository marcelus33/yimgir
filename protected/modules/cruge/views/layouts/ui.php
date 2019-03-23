<?php
/*
	aqui: $this->beginContent('//layouts/main'); indica que este layout se amolda 
	al layout que se haya definido para todo el sistema, y dentro de el colocara
	su propio layout para amoldar a un CPortlet.
	
	esto es para asegurar que el sistema disponga de un portlet, 
	esto es casi lo mismo que haber puesto en UiController::layout = '//layouts/column2'
	a diferencia que aqui se indica el uso de un archivo CSS para estilos predefinidos
	
	Yii::app()->layout asegura que estemos insertando este contenido en el layout que
	se ha definido para el sistema principal.
*/
?>

<?php	
	if(Yii::app()->user->isSuperAdmin)
		echo Yii::app()->user->ui->superAdminNote();
?>
<?php	
	if(Yii::app()->user->isSuperAdmin)
		echo Yii::app()->user->ui->superAdminNote();
?>
<?php $this->beginContent('//layouts/main'); ?>
 <div class="row">
 <div class="span2">
 <?php if(Yii::app()->user->checkAccess('admin')) { ?>
 <?php
 $this->widget('bootstrap.widgets.TbBox', array(
 'title'=>'Operaciones',
 'headerIcon' => 'icon-th-list',
 'content'=> $this->widget('zii.widgets.CMenu', array(
 'items'=>Yii::app()->user->ui->adminItems,
 ),true),
 ));
 ?>
 </div>
 <?php } ?>
 <div class="span10">
 <?php echo $content; ?>
 </div>
 </div>
<?php $this->endContent(); ?>


