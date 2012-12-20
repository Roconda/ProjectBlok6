<?php
/* @var $this AssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Assign',
);
?>

<h1>Assign</h1>



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
                array('name' => 'user.username', 'header' => Yii::t('assign', 'Username')),
                array('name' => 'traject.description', 'header' => Yii::t('assign', 'Trail')),
                array('name' => 'traject.duration', 'header' => Yii::t('assign', 'Duration')),
                array('name' => 'startdate'),
                array('name' => 'completed'),
	)

)); 

?>
</div>

<?php require_once(__DIR__.'/../components/button/assign.php'); ?>