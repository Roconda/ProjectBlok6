<?php
/* @var $this TrajectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trajects',
);

$this->menu=array(
	array('label'=>'Create Traject', 'url'=>array('create')),
	array('label'=>'Manage Traject', 'url'=>array('admin')),
);
?>

<h1>Trajects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
