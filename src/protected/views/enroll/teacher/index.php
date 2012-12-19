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
                array('name' => 'courseoffer.course.description', 'header' => 'Course'),
		array('name' => 'courseoffer.location.description', 'header' => 'Location'),
                array('name' => 'courseoffer.year', 'header' => 'Year'),
                array('name' => 'courseoffer.block', 'header' => 'block'),
                array('name' => 'courseoffer.course.required', 'header' => 'Required'),
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