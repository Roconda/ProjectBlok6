<?php
$this->breadcrumbs=array(
	'Trajects',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('traject-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1><?php echo Yii::t('traject', 'Trails'); ?></h1>
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
		array('label'=>Yii::t('main','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array(), 'visible' => Yii::app()->user->can('traject_create') || Yii::app()->user->isAdmin()),
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
	'id'=>'traject-grid',
	'dataProvider'=>$model->search(),
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'description',
		'duration',
		'nrcourses',
       array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'buttons' => array(
				'view' => array(
					'visible' => 'false',
				),
				'update' => array(
					'label'=> Yii::t('zii','Update'),
					'visible' => 'Yii::app()->user->can("traject_update") || Yii::app()->user->isAdmin()',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> Yii::t('zii','Delete'),
					'visible' => 'Yii::app()->user->can("traject_delete") || Yii::app()->user->isAdmin()',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
           )
	),
)); ?>

