<?php
/* @var $this CourseofferController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courseoffers',
);

$this->menu=array(
	array('label'=>'Create Courseoffer', 'url'=>array('create')),
	array('label'=>'Manage Courseoffer', 'url'=>array('admin')),
);
?>

<h1>Cursus aanbod</h1>

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
)); 

?>
