<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'traject-form',
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

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>45)); ?>

        <?php echo $form->labelEx($model,'duration'); ?>
	<?php echo $form->numberField($model,'duration',array('class'=>'span5')); ?>
        <?php echo $form->error($model,'duration'); ?>                    
                            
        <?php echo $form->labelEx($model,'nrcourses'); ?>                       
	<?php echo $form->numberField($model,'nrcourses',array('class'=>'span5')); ?>
        <?php echo $form->error($model,'nrcourses'); ?>                       
                            
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
