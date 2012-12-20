<?php
/* @var $this AssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assign',
);
?>

<h1>Assign</h1>



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
        'id'=>'assign-tabel',
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
	//'itemView'=>'_view',
    'columns' => array(
                array('name' => 'user.username', 'header' => Yii::t('assign', 'Username')),
                array('name' => 'traject.description', 'header' => Yii::t('assign', 'Trail')),
                array('name' => 'traject.duration', 'header' => Yii::t('assign', 'Duration')),
                array('name' => 'startdate'),
                array('name' => 'completed'),
                array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}',
                        'buttons'=>array(
                            'update'=>array(
                            'url'=>'Yii::app()->createUrl("assign/update", array("id"=>$data->user_id))',
                                )
                            )
                )
	)
    
)); 

?>
</div>

<?php require_once(__DIR__.'/../components/button/assign.php'); ?>
<?php require_once(__DIR__.'/../components/button/completed.php'); ?>
