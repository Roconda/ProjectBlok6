<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	
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
    		font-weight: bold;
    	}
    	.nav-list > li > a {
    		color: #81001C;
    	}
    </style>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">


		<div class="row" id="paddingContent">

			<?php require_once('nav_horizontal.php'); ?>


	
			<div class="span3">
				<?php require_once('nav_vertical.php'); ?>
			</div>
			

			<div class="span8 offset1">
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
