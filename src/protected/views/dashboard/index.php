<h1>Dashboard</h1>

<div class="row">
	<div class="span3">
		<h3>Enroll overzicht</h3>
		<div id="enroll_data"></div>
	</div>
	
	<div class="offset2 span3">
		
	</div>
</div>

<script type="text/javascript">
$(function() {
		 <?php echo CHtml::ajax(array(
		 	'url' => array('enroll/indexajax'),
		 	'update' => '#enroll_data'
		 )) ?>
});
</script>
