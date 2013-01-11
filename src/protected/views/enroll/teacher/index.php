<?php
/* @var $this EnrollController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Enroll',
);
?>

<h1><?php echo Yii::t('enroll', 'My Enrollments') ?></h1>

<?php

$buttonData = array();
foreach($dataProvider->data as $x) {
    $buttonData[$x->courseoffer_id] = $x->courseoffer->blocked;
    
}

//$model = $dataProvider->data;
//$buttonData = $model->courseoffer->blocked;
    
?>

<div class="row">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,
        'type' => 'striped',
        'columns' => array(
            array('name' => 'courseoffer.course.description', 'header' => Yii::t('enroll', 'Course')),
            array('name' => 'courseoffer.location.description', 'header' => Yii::t('enroll', 'Location')),
            array('name' => 'courseoffer.year', 'header' => Yii::t('enroll', 'Year')),
            array('name' => 'courseoffer.block', 'header' => Yii::t('enroll', 'Trail')),
            array('name' => 'courseoffer.course.required', 'type' => 'boolean', 'header' => Yii::t('enroll', 'Required')),
            array('name' => 'completed', 'type' => 'raw', 'value' => 'Enroll::model()->getCompleted($data->completed)'),
            array('name' => 'notes'),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update} {delete}',
                'buttons' => array(
                    'view' => array(
                        'label' => 'View',
                        'url' => 'Yii::app()->createUrl("enroll/view", array("id"=>$data->user_id, "cid"=>$data->courseoffer_id))',
                        'options' => array(
                            'class' => 'btn btn-small view'
                        )
                    ),
                    'update' => Enroll::model()->getTeacherButtonItem(0, 'update'),
                    'delete' => Enroll::model()->getTeacherButtonItem(0, 'delete'),   
                ),
                'htmlOptions' => array('style' => 'width: 125px'),
            )
        ),
    ));
    ?>	

    <?php
    $id = Yii::app()->user->getId();
    $assign = $assignModel->findAll("user_id=$id");
    foreach ($assign as $as) {
        $hasTraject = $as->user_id;
    }
    if (isset($hasTraject)) {
        require_once(__DIR__ . '/../../components/button/teacher/enroll.php');
    }
    ?>
</div>