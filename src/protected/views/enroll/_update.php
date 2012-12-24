
<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'enroll-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php $courseofferList = $this->getCourseOfferList(); ?>

       <div class="row">
            <?php echo $form->labelEx($model,'user_id'); ?>
            <?php echo $form->textField($model,'user_id',array('value'=>$enrollment['username'])); ?>
            <?php echo $form->error($model,'user_id'); ?>
       </div>

	<div class="row">
                <?php echo $form->labelEx($model,'courseoffer_id'); ?>
		<?php echo $form->dropDownList($model,'courseoffer_id',$courseofferList,
                        array('options' => array($enrollment['courseoffer_id']=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'courseoffer_id'); ?>
	</div>
        
       <div class="row">
                <?php echo $form->labelEx($model,'completed'); ?>
		<?php echo $form->textField($model,'completed',array('value'=>$enrollment['completed'])); ?>
		<?php echo $form->error($model,'completed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->