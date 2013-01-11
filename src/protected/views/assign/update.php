<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	'Update',
);

$assignment = array();
foreach($model as $value)
{
    $model = $value;
    $name = $value->user->username;
    $assignment['username'] = $name;
    $assignment['user_id'] = $value->user_id;
    $assignment['traject_id'] = $value->traject_id;
    $assignment['startdate'] = $value->startdate;
    $assignment['completed'] = $value->completed;
    $assignment['notes'] = $value->notes;
}
?>

<h1><?php echo Yii::t('assign', 'Update Assign')?></h1>
<hr/>

<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>Yii::t('main','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
		array('label'=>Yii::t('main','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<?php 
if(yii::app()->user->can('assign_update_completed')) {
    echo $this->renderPartial('_completed', array('model'=>Assign::model(),
                                                    'assignment'=>$assignment,));
}
else if(yii::app()->user->can('assign_update')
        || (yii::app()->user->getName() == 'admin')) {
    echo $this->renderPartial('_update', array('model'=>Assign::model(),
                                                    'assignment'=>$assignment,));
} else if(yii::app()->user->can('assign_update_own')) {
    echo $this->renderPartial('teacher/_form', array('model'=>$model,
                                                    'assignment'=>$assignment,));
}

?>