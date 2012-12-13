<?php
/* @var $this EnrollController */
/* @var $model Enroll */

$this->breadcrumbs=array(
	'Enroll'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Enroll', 'url'=>array('index')),
	array('label'=>'Manage Enroll', 'url'=>array('admin')),
);
?>

<h1>Create Enroll</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>