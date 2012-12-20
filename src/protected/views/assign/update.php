<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	'Update',
);

$this->menu=array(
	array('label'=>'List Courseoffer', 'url'=>array('index')),
);
foreach($model as $value)
{
    $id = $value->user_id;
}
?>

<h1>Update Courseoffer <?php echo $id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>