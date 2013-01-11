<?php
/* @var $this EnrollController */
/* @var $model Enroll */

$this->breadcrumbs=array(
	'Enroll'=>array('ownindex'),
	'Create',
);
?>

<h1><?php echo Yii::t('enroll', 'Enroll course'); ?></h1>
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

<?php echo $this->renderPartial('teacher/_form', array('model'=>$model)); ?>