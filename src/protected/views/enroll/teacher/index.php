<?php
/* @var $this EnrollController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Enroll',
);
?>

<h1>Teacher Enrollment</h1>



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
                array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
		array('name' => 'courseoffer.location.description', 'header' => Yii::t('enroll', 'Location')),
                array('name' => 'courseoffer.year', 'header' => Yii::t('enroll', 'Year')),
                array('name' => 'courseoffer.block', 'header' => Yii::t('enroll', 'Trail')),
                array('name' => 'courseoffer.course.required', 'header' => Yii::t('enroll', 'Required')),
                array('name' => 'completed'),
                array('name' => 'notes'),
	)

)); 

?>
    
<?php 
$id = Yii::app()->user->getId();
$assign = $assignModel->findAll("user_id=$id");
foreach($assign as $as) {
      $hasTraject = $as->user_id;
}
if(isset($hasTraject))
{
    require_once(__DIR__.'/../../components/button/teacher/enroll.php');
}
?>
</div>