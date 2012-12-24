<?php
$this->breadcrumbs=array(
	'Locations',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('location-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Locations</h1>
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
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array(), 'visible' => Yii::app()->user->can('location_create') ),
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
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'location-grid',
	'dataProvider'=>$model->search(),
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		'id',
		'description',
       array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}{update}{delete}',
			'buttons' => array(
			    'view' => array(
					'label'=> 'View',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),	
				'update' => array(
					'label'=> 'Update',
					'visible' => 'Yii::app()->user->can("location_update")',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'visible' => 'Yii::app()->user->can("location_delete")',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
           )
	),
)); ?>

