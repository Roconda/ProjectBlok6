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
	//'itemView'=>'_view',
    'columns' => array(
                array('name' => 'courseoffer_id'),
                array('name' => 'user.username', 'header' => 'Username'),
                array('name' => 'courseoffer.course.description', 'header' => 'Course'),
		array('name' => 'courseoffer.location.description', 'header' => 'Location'),
                array('name' => 'completed'),
                array('name' => 'notes'),
	)

)); 

?>
</div>

<?php require_once(__DIR__.'/../components/button/enroll.php'); ?>