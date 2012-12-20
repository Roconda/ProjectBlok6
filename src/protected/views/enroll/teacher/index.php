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

require_once '_index_table.php';

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