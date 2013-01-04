<div class="row">
		<h3>Enroll overzicht</h3>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'type' => 'striped',
    'columns' => array(
                array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
                array('name' => 'courseoffer.course.required', 'type' => 'boolean', 'header' => Yii::t('enroll', 'Required')),
                array('name' => 'completed'),
	)

)); 
?>