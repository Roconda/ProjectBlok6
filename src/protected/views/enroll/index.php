<?php
/* @var $this EnrollController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Enroll',
);
?>

<h1>Enroll</h1>



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
    'columns' => array(
                array('name' => 'user.profile.firstname', 'header' => Yii::t('enroll', 'Firstname')),
                array('name' => 'user.profile.lastname', 'header' => Yii::t('enroll', 'Lastname')),
                array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
		array('name' => 'courseoffer.location.description', 'header' => Yii::t('enroll', 'Location')),
                array('name' => 'completed'),
                array(
                        'class'=>'CButtonColumn',
                        'template'=>'{update}',
                        'buttons'=>array(
                            'update'=>array(
                            'url'=>'Yii::app()->createUrl("enroll/update", 
                                array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))',
                                )
                            )
                )
	)

)); 

?>
</div>

<?php require_once(__DIR__.'/../components/button/enroll.php'); ?>