<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-courseoffer-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  
$checkBoxRow=array(1 => Yii::t('main','Yes'), 0 => Yii::t('main','No'));
?>


	<?php //echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'course_description',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'location_description',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'block',array('class'=>'span5')); ?>
	
	<?php //echo $form->checkBoxListInlineRow($model,'fysiek',$checkBoxRow); ?>
	
	<?php //echo $form->checkBoxListInlineRow($model,'blocked',$checkBoxRow); ?>

	<?php //echo $form->checkBoxListInlineRow($model,'course_required',$checkBoxRow); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Search')); ?>
               <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset', 'htmlOptions'=>array('class'=>'btnreset btn-small'))); ?>
	</div>

<?php $this->endWidget(); ?>


<?php $cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","#search-course-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

