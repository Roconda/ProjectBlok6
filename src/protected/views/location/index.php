<?php
/* @var $this LocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Locations',
);

$this->menu=array(
	array('label'=>'Create Location', 'url'=>array('create')),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h1>Locaties</h1>

<?php 
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
 * 
 */ 

$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
	//'itemView'=>'_view',
)); 

 
 ?>
