<h1>Dashboard</h1>

<div class="row span6">
	<div id="ajax_data"><p>Momenteel geen informatie beschikbaar.</p></div>
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
