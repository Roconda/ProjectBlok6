<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('courseOffer','List course offer'), 'url'=>array('index')),
	array('label'=>Yii::t('courseOffer','Create course'), 'url'=>array('create')),
	array('label'=>Yii::t('courseOffer','View course'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('courseOffer','Manage course offer'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('courseOffer','Update course offer')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>