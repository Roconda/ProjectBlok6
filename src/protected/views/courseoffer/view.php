<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Courseoffer', 'url'=>array('index')),
	array('label'=>'Create Courseoffer', 'url'=>array('create')),
	array('label'=>'Update Courseoffer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Courseoffer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courseoffer', 'url'=>array('admin')),
);
?>

<h1>View Courseoffer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_id',
		'location_id',
		'year',
		'block',
		'fysiek',
		'blocked',
	),
)); ?>
