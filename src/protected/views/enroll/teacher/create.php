<?php
/* @var $this EnrollController */
/* @var $model Enroll */

$this->breadcrumbs=array(
	'Enroll'=>array('ownindex'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Enroll', 'url'=>array('ownindex')),
);
?>

<h1><?php echo Yii::t('enroll', 'Enroll course'); ?></h1>
<?php echo $this->renderPartial('teacher/_form', array('model'=>$model)); ?>