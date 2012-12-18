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
        
        <div class="row">
            <?php echo $form->labelEx($model,'user_id'); ?>
            <?php echo $form->textField($model,'user_id'); ?>
            <?php echo $form->error($model,'user_id'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model,'traject_id'); ?>
            <?php echo $form->textField($model,'traject_id'); ?>
            <?php echo $form->error($model,'traject_id'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'startdate'); ?>
            <?php echo $form->textField($model,'startdate'); ?>
            <?php echo $form->error($model,'startdate'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'completed'); ?>
            <?php echo $form->textField($model,'completed'); ?>
            <?php echo $form->error($model,'completed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --><?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
