<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Enroll'=>array('index'),
	'Update',
);

$enrollment = array();
foreach($model as $value)
{
	$model = $value;
    $name = $value->user->username;
    $enrollment['username'] = $name;
    $enrollment['user_id'] = $value->user_id;
    $enrollment['courseoffer_id'] = $value->courseoffer_id;
    $enrollment['completed'] = $value->completed;
    $enrollment['notes'] = $value->notes;
}
?>
<h1><?php echo Yii::t('enroll', 'Update Enroll')?></h1>
<hr />
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
		array('label'=>Yii::t('main','Update'), 'icon'=>'icon-edit', 'url'=>'Yii::app()->createUrl("enroll/update", array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))','active'=>true, 'linkOptions'=>array()),
		//'url'=>'Yii::app()->createUrl("enroll/update", array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))',
	),
));
$this->endWidget();
?>

<?php 
if(yii::app()->user->can('enroll_update_completed')) {
    echo $this->renderPartial('_completed', array('model'=>$model,
                                                    'enrollment'=>$enrollment,));
}
else if(yii::app()->user->can('enroll_update')
        || (yii::app()->user->isAdmin())) {
    echo $this->renderPartial('_update', array('model'=>$model,
                                                    'enrollment'=>$enrollment,));
} else if(yii::app()->user->can('enroll_update_own')) {
    echo $this->renderPartial('teacher/_form', array('model'=>$model,
                                                    'enrollment'=>$enrollment,));
}
?>
