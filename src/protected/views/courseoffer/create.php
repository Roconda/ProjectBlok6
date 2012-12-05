<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Courseoffer', 'url'=>array('index')),
	array('label'=>'Manage Courseoffer', 'url'=>array('admin')),
);
?>

<h1>Create Courseoffer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>