<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-assign-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


	<?php echo $form->textFieldRow($model,'user_username',array('class'=>'span5')); //user.username ?>

	<?php echo $form->textFieldRow($model,'traject_description',array('class'=>'span5')); //traject.description ?>

	<?php echo $form->textFieldRow($model,'traject_duration',array('class'=>'span5')); //traject.duration ?>
	
        <?php echo $form->labelEx($model,'startdate'); ?>
	<?php echo $form->dateField($model,'startdate',array('class'=>'span5')); ?>
        <?php echo $form->error($model,'startdate'); ?>

	<?php echo $form->textFieldRow($model,'completed',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'notes',array('class'=>'span5')); ?>

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
	$(":input","#search-assign-form").each(function() {
	var type = this.type;
	var tag = this.tagName.toLowerCase(); // normalize case
	if (type == "text" || type == "password" || tag == "textarea") this.value = "";
	else if (type == "checkbox" || type == "radio") this.checked = false;
	else if (tag == "select") this.selectedIndex = "";
  });
});
</script>