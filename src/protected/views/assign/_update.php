<?php
/* @var $this CourseofferController */
/* @var $model Courseoffer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assign-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php $trajectList = $this->getTrajectList(); ?>
        <?php $completedList = $this->getCompletedList() ?>
        
       <div class="row">
            <?php echo $form->labelEx($model,'user_id'); ?>
            <?php echo $form->textField($model,'user_id',array('value'=>$assignment['username'])); ?>
            <?php echo $form->error($model,'user_id'); ?>
	</div>
        
	<div class="row">
                <?php echo $form->labelEx($model,'traject_id'); ?>
		<?php echo $form->dropDownList($model,'traject_id',$trajectList,
                        array('options' => array($assignment['traject_id']=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'traject_id'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'startdate'); ?>
		<?php echo $form->dateField($model,'startdate', array('value'=>$assignment['startdate'])); ?>
		<?php echo $form->error($model,'startdate'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model,'completed'); ?>
            <?php echo $form->dropDownList($model,'completed',$completedList,
                        array('options' => array($assignment['completed']=>array('selected'=>true)))); ?>
            <?php echo $form->error($model,'completed'); ?>
	</div>
        
	<div class="row buttons">
		<?php
                    echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->