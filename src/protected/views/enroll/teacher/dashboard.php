<h3><?php echo Yii::t('dashboard','Course overview') ?></h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
	'enableSorting' => false,
    'columns' => array(
                array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
                array('name' => 'courseoffer.course.required', 'type' => 'boolean', 'header' => Yii::t('enroll', 'Required')),
                array('name' => 'completed', 'type' => 'raw', 'value' => 'Enroll::model()->getCompleted($data->completed)'),
	)

)); 
?>