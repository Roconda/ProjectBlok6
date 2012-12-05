<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Courseoffer', 'url'=>array('index')),
	array('label'=>'Create Courseoffer', 'url'=>array('create')),
	array('label'=>'View Courseoffer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Courseoffer', 'url'=>array('admin')),
);
?>

<h1>Update Courseoffer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>