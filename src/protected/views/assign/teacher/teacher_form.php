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

        <?php
            $traject = Traject::model()->findAll();
            $dick = array();
            foreach($traject as $tr){
                $dick[$tr->id] = $tr->description;
            }
        ?>
        
       <div class="row">
            <?php echo $form->hiddenField($model,'user_id',array('value'=>yii::app()->user->getId())); ?>
            <?php echo $form->error($model,'user_id'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'traject_id'); ?>
		<?php echo $form->dropDownList($model,'traject_id',$dick); ?>
		<?php echo $form->error($model,'traject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startdate'); ?>
		<?php echo $form->dateField($model,'startdate'); ?>
		<?php echo $form->error($model,'startdate'); ?>
	</div>

        <div class="row">
            <?php echo $form->hiddenField($model,'completed',array('value'=>'1')); ?>
            <?php echo $form->error($model,'completed'); ?>
	</div>
        
	<div class="row buttons">
		<?php
                    echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
