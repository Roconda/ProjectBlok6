<?php
/* @var $this TrajectController */
/* @var $model Traject */

$this->breadcrumbs=array(
	'Trajects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Traject', 'url'=>array('index')),
	array('label'=>'Manage Traject', 'url'=>array('admin')),
);
?>

<h1>Create Traject</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>