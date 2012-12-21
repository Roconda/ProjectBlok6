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
$enrollment = array();
foreach($model as $value)
{
    $name = $value->user->username;
    $enrollment['username'] = $name;
    $enrollment['user_id'] = $value->user_id;
    $enrollment['courseoffer_id'] = $value->courseoffer_id;
    $enrollment['completed'] = $value->completed;
}
?>

<h1>Update Courseoffer <?php echo $name; ?></h1>

<?php 
if(yii::app()->user->can('enroll_update_completed')) {
    echo $this->renderPartial('_completed', array('model'=>Enroll::model(),
                                                    'enrollment'=>$enrollment,));
}
else if(yii::app()->user->can('enroll_update')
        || (yii::app()->user->getName() == 'admin')) {
    echo $this->renderPartial('_update', array('model'=>Enroll::model(),
                                                    'enrollment'=>$enrollment,));
}
?>