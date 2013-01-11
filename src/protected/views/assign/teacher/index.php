<?php
/* @var $this AssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assign',
);
?>

<h1><?php echo Yii::t('assign','My Assigns') ?></h1>



<div class="row">
<?php
/* 
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

 * 
 */
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
	//'itemView'=>'_view',
    'columns' => array(
                array('name' => 'traject.description', 'header' => Yii::t('assign', 'Trail')),
                array('name' => 'traject.duration', 'header' => Yii::t('assign', 'Duration')),
                array('name' => 'startdate'),
                array('name' => 'completed', 'type' => 'raw', 'value' => 'Enroll::model()->getCompleted($data->completed)'),
                array('name' => 'notes'),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{update}',
			'buttons' => array(	
				'update' => array(
					'label'=> 'Update',
					'visible' => 'Yii::app()->user->can("assign_update_own")',
					'url'=>'Yii::app()->createUrl("assign/update", array("id"=>$data->user_id, "tid"=>$data->traject_id))',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
	   )
	),
)); ?>

<?php 
if(!$dataProvider->totalItemCount > 0)
    require_once(__DIR__.'/../../components/button/teacher/assign.php'); 
?>
    
</div>

