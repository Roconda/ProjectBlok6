<?php
/* @var $this TrajectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Traject',
);
?>

<h1>Trajecten</h1>

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
		    'label'=>'Create Offer',
		    'type'=>'null',
		    'url' => array('create')
		));
		?>
		 
		&nbsp;
		
		<?php
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Manage Offer',
		    'type'=>'null',
		    'url' => array('admin')
		));
		?>
	</div>
</div>
