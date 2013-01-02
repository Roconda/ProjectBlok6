<?php
$this->breadcrumbs=array(
	'Courses',
);

$crit = $model->findAll();
foreach($crit as $c)
{
echo $c->course->description;
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('course-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<h1>Courses offer</h1>
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
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array(), 'visible' => Yii::app()->user->can('courseoffer_create') || Yii::app()->user->isAdmin()),
		array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>

<?php $courseoffer = Courseoffer::model()->findAll();
            $bob = array();
            foreach($courseoffer as $cs){
                $loc = "";
                if(isset($cs->location->description)){
                    $loc = $cs->location->description;
                }
                $id = md5($cs->id);
                $polis = $loc;
                $bob[$id] = $polis;
            }
        ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'course-grid',
	'dataProvider'=>$model->search(),
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		array('name'=>'course_description', 'type'=>'raw', 'value'=>'$data->course->description'),
		array('name' => 'location_description', 'type'=>'raw', 'value'=>'1'),
		array('name' => 'year'),
		array('name' => 'block'),
		array('name' => 'fysiek'),
		array('name' => 'blocked'),
		array('name' => 'course_required', 'type'=>'raw', 'value'=>'$data->course->required'),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view} {update} {delete}',
			'buttons' => array(
			      'view' => array(
					'label'=> 'View',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),	
				'update' => array(
					'label'=> 'Update',
					'visible' => 'Yii::app()->user->can("courseoffer_update")',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'visible' => 'Yii::app()->user->can("courseoffer_delete")',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
           )
	),
)); ?>
