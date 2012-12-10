<?php
/* @var $this TrajectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Traject',
);

$this->menu=array(
	array('label'=>'Create Traject', 'url'=>array('create')),
	array('label'=>'Manage Traject', 'url'=>array('admin')),
);
?>

<h1>Trajecten</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
	//'itemView'=>'_view',
)); 

/*
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS'),
    'attributes'=>array(
        array('name'=>'firstName', 'label'=>'First name'),
        array('name'=>'lastName', 'label'=>'Last name'),
        array('name'=>'language', 'label'=>'Language'),
 */
?>
