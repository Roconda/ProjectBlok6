<?php
/* @var $this TrajectController */
/* @var $model Traject */

$this->breadcrumbs=array(
	'Trajects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Traject', 'url'=>array('index')),
	array('label'=>'Create Traject', 'url'=>array('create')),
	array('label'=>'View Traject', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Traject', 'url'=>array('admin')),
);
?>

<h1>Update Traject <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>