<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model); ?>
        		
   <div class="control-group">		
			<div class="span4">
                            
        <?php $completedList = array('uncompleted' => Yii::t('enroll', 'uncompleted'),
                                     'failed' => Yii::t('enroll', 'failed'),
                                     'completed' => Yii::t('enroll', 'completed')) ?>
                            
	<?php echo $form->textFieldRow($model,'user_id',array('value'=>$enrollment['username']),array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'courseoffer_id',$this->getCourseOfferList(),
                array('options' => array($enrollment['courseoffer_id']=>array('selected'=>true)), 'class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'completed',$completedList,
                array('options' => array($enrollment['completed']=>array('selected'=>true)))); ?>
                        </div>   
  </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
              <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>'Reset',
		)); ?>
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div>
