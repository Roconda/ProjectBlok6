

<div class="row span6">
	<h1><?php echo Yii::t('dashboard','Dashboard') ?></h1>
	<div id="ajax_data"><p> <?php echo Yii::t('dashboard','There is no information available at the moment.') ?> </p></div>
</div>

<script type="text/javascript">
$(function() {
		 <?php 
		 if(yii::app()->user->can('enroll_read_own')) {
			 echo CHtml::ajax(array(
			 	'url' => array('enroll/indexajax'),
			 	'update' => '#ajax_data'
			 )); 
		 }
		 ?> 
});
</script>
