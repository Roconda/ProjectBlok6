<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'courseoffer-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
     	<fieldset>
		<legend>
			<p class="note"><?php echo Yii::t('main', 'Fields with <span class="required">*</span> are required.'); ?></p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">
        <?php $courseList = $this->getCourseList(); ?>
        <?php $locationList = $this->getLocationList(); ?>

	<?php echo $form->dropDownListRow($model,'course_id',$courseList); ?>

	<?php echo $form->dropDownListRow($model,'location_id',$locationList); ?>
	
	<?php echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'block',array('class'=>'span5')); ?>
	
	<?php echo $form->checkboxRow($model,'fysiek'); ?>
	
	<?php echo $form->checkboxRow($model,'blocked'); ?>

                        </div>   
  </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? Yii::t('main','Create') : Yii::t('main','Save'),
		)); ?>
              <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>Yii::t('main','Reset'),
		)); ?>
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div>
