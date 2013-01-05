<?php
$this->breadcrumbs=array(
	'Enroll',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('enroll-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Enroll</h1>
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
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array(), 'visible' => Yii::app()->user->can('enroll_create') || Yii::app()->user->isAdmin()),
		array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$dataProvider->model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'enroll-grid',
	'dataProvider'=>$dataProvider,
        //'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		array('name' => 'user.profile.firstname', 'header' => Yii::t('enroll', 'Firstname')),
		array('name' => 'user.profile.lastname', 'header' => Yii::t('enroll', 'Lastname')),
		array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
		array('name' => 'courseoffer.location.description', 'header' => Yii::t('enroll', 'Location')),
		array('name' => 'completed'),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{update} {delete}',
			'buttons' => array(
			      'view' => array(
					'label'=> 'View',
					'url'=>'Yii::app()->createUrl("enroll/view", array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),
				'update' => array(
					'label'=> 'Update',
					'visible' => 'Yii::app()->user->can("enroll_update") || Yii::app()->user->can("enroll_update_completed") || Yii::app()->user->isAdmin()',
					'url'=>'Yii::app()->createUrl("enroll/update", array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'visible' => 'Yii::app()->user->can("enroll_delete") || Yii::app()->user->isAdmin()',
					'url'=>'Yii::app()->createUrl("enroll/delete", array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
           )
	),
)); ?>
