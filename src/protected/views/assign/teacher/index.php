<?php
/* @var $this AssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assign',
);
?>

<h1>Teacher Assignment</h1>



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
                array('name' => 'traject.description', 'header' => 'Traject'),
                array('name' => 'traject.duration', 'header' => 'Duration'),
                array('name' => 'completed'),
                array('name' => 'notes'),
	)

)); 

?>
    
<?php require_once(__DIR__.'/../../components/button/assign.php'); ?>
    
</div>

