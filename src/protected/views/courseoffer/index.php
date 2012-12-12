<?php
/* @var $this CourseofferController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courseoffers',
);
?>

<h1>Cursus aanbod</h1>


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
		array('name' => 'id'),
		array('name' => 'location.description', 'header' => Yii::t('location', 'Location')),
		array('name' => 'year'),
		array('name' => 'block'),
		array('name' => 'fysiek'),
		array('name' => 'blocked'),
	)
)); 

?>
</div>

<?php require_once(__DIR__.'/../components/button/create_manage.php'); ?>