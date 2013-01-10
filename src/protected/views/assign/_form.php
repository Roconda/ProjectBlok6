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
			<p class="note"><?php echo Yii::t('main', 'Fields with <span class="required">*</span> are required.'); ?></p>
		</legend>

	<?php echo $form->errorSummary($model); ?>
        		
   <div class="control-group">		
			<div class="span4">

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'traject_id',$this->getTrajectList(),null,array('class'=>'span5')); ?>

        <?php echo $form->labelEx($model,'startdate',array('class'=>'span5')); ?>
	<?php echo $form->dateField($model,'startdate',array('class'=>'span5')); ?>
	<?php echo $form->error($model,'startdate',array('class'=>'span5')); ?>
                            
	<?php echo $form->hiddenField($model,'completed',array('class'=>'span5','value'=>'1')); ?>
        <?php echo $form->error($model,'completed',array('class'=>'span5')); ?>
                            
        <?php echo $form->textFieldRow($model,'notes',array('class'=>'span5')); ?>
	
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