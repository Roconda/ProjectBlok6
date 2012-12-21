<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
    'columns' => array(
                array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
		array('name' => 'courseoffer.location.description', 'header' => Yii::t('enroll', 'Location')),
                array('name' => 'courseoffer.year', 'header' => Yii::t('enroll', 'Year')),
                array('name' => 'courseoffer.block', 'header' => Yii::t('enroll', 'Trail')),
                array('name' => 'courseoffer.course.required', 'header' => Yii::t('enroll', 'Required')),
                array('name' => 'completed'),
                array('name' => 'notes'),
	)

)); 
?>