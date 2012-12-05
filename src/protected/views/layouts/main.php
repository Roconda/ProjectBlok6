<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<!-- blueprint CSS framework -->
	
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	-->
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	-->
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    	<!--[if lt IE 9]>
      	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <style type="text/css">
    	#paddingContent{
    		margin-top: 60px;
    	}
    	.avans-text{
    		color: #C6002A;
    	}
    </style>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">

		<div class="row">
			<?php require_once('nav_horizontal.php'); ?>
		</div>

		<div class="row" id="paddingContent">
	
			<div class="span3">
				<?php require_once('nav_vertical.php'); ?>
			</div>
			

			<div class="span6">
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>
			
				<?php echo $content; ?>
			</div>
		
			<div class="clear"></div>
		

		</div>
		
		<div class="row span12">
			<footer>
				<hr>
				<p class="pagination-centered muted">Voor vragen <a href="mailto:ddcd@avans.nl">mail ons</a></p>
			</footer>
		</div>
	</div><!-- container -->

</body>
</html>
