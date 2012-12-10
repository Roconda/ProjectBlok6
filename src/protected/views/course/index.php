<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cursus',
);
?>

<h1>Courses</h1>

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
)); 

?>
</div>

<div class="row">
	<div class="pull-right">
		<?php
		
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Create',
		    'type'=>'null',
		    'url' => array('create')
		));
		?>
		 
		&nbsp;
		
		<?php
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Manage',
		    'type'=>'null',
		    'url' => array('admin')
		));
		?>
	</div>
</div>
