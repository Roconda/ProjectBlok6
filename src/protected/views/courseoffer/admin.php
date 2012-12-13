<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */

$this->breadcrumbs=array(
	'Courseoffers'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('courseoffer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Courseoffers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'courseoffer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'course_id',
		'location_id',
		'year',
		'block',
		'fysiek',
		/*
		'blocked',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php require_once(__DIR__.'/../components/button/create_view.php'); ?>
