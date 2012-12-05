<?php
/* @var $this TrajectController */
/* @var $model Traject */

$this->breadcrumbs=array(
	'Trajects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Traject', 'url'=>array('index')),
	array('label'=>'Create Traject', 'url'=>array('create')),
	array('label'=>'Update Traject', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Traject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Traject', 'url'=>array('admin')),
);
?>

<h1>View Traject #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'duration',
		'nrcourses',
	),
)); ?>
