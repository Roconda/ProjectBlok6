<?php
/* @var $this AssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assign',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('assign-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Assign</h1>
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
		array('label'=>Yii::t('main','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array(), 'visible' => Yii::app()->user->can('assign_create') || Yii::app()->user->isAdmin()),
		array('label'=>Yii::t('main','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>Yii::t('main','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>Yii::t('main','Export to PDF'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>Yii::t('main','Export to Excel'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'assign-grid',
	'dataProvider'=>$model->search(),
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		array('name' => 'user.username', 'header' => Yii::t('assign', 'Username'), 'type' => 'raw', 'value' => 'CHtml::link($data->user->username, array("/enroll?Enroll%5Busername%5D=".$data->user->username))'),
		array('name' => 'traject.description', 'header' => Yii::t('assign', 'Trail')),
		array('name' => 'traject.duration', 'header' => Yii::t('assign', 'Duration')),
		array('name' => 'startdate'),
		array('name' => 'completed', 'type' => 'raw', 'value' => 'Enroll::model()->getCompleted($data->completed)'),
                array('name' => 'notes'),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			//'template' => '{view} {update} {delete}',
			'buttons' => array(	
				'view' => array(
					'visible'=> 'false',
				),
				'update' => array(
					'label'=> 'Update',
					'visible' => 'Yii::app()->user->can("assign_update") || Yii::app()->user->can("assign_update_completed") || Yii::app()->user->isAdmin()',
					'url'=>'Yii::app()->createUrl("assign/update", array("id"=>$data->user_id, "tid"=>$data->traject_id))',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'visible' => 'Yii::app()->user->can("assign_delete") || Yii::app()->user->isAdmin()',
					'url'=>'Yii::app()->createUrl("assign/delete", array("id"=>$data->user_id, "tid"=>$data->traject_id))',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
	   )
	),
)); ?>