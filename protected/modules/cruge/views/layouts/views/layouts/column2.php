<?php $this->beginContent('yimgir/themes/bootstrap/views/main'); ?>
 <div class="row">
 <div class="span2">
 <?php
 $this->widget('bootstrap.widgets.TbBox', array(
 'title'=>'Operaciones',
 'headerIcon' => 'icon-th-list',
 'content'=> $this->widget('zii.widgets.CMenu', array(
 'items'=>$this->menu,
 ),true),
 ));
 ?>
 </div>
 <div class="span10">
 <?php echo $content; ?>
 </div>
 </div>
<?php $this->endContent(); ?>

