<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courseoffer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php
            $courseoffer = Courseoffer::model()->findAll();
            $course = Course::model()->findAll();
            $dick = array();
            foreach($courseoffer as $cs){
                $dick[$cs->id] = $cs->id;
            }
        ?>

       <div class="row">
            <?php echo $form->hiddenField($model,'user_id',array('value'=>yii::app()->user->getId())); ?>
            <?php echo $form->error($model,'user_id'); ?>
       </div>

	<div class="row">
		<?php echo $form->labelEx($model,'courseoffer_id'); ?>
		<?php echo $form->dropDownList($model,'courseoffer_id',$dick); ?>
		<?php echo $form->error($model,'courseoffer_id'); ?>
	</div>
        
       <div class="row">
		<?php echo $form->hiddenField($model,'completed',array('value'=>'1')); ?>
		<?php echo $form->error($model,'completed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->