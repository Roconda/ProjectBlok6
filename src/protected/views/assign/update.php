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
$assignment = array();
foreach($model as $value)
{
    $name = $value->user->username;
    $assignment['user_id'] = $value->user_id;
    $assignment['traject_id'] = $value->traject_id;
    $assignment['startdate'] = $value->startdate;
    $assignment['completed'] = $value->completed;
}
?>

<h1>Update Assign <?php echo $name; ?></h1>

<?php 
if(yii::app()->user->can('assign_update_completed')) {
    echo $this->renderPartial('_completed', array('model'=>Assign::model(),
                                                    'assignment'=>$assignment,));
}
else if(yii::app()->user->can('assign_update_completed')
        || (yii::app()->user->getName() == 'admin')) {
    echo $this->renderPartial('_update', array('model'=>Assign::model(),
                                                    'assignment'=>$assignment,));
}

?>