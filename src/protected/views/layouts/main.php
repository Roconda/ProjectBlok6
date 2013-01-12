<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    	<!--[if lt IE 9]>
      	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flash.css" />
	
    <style type="text/css">
    	body{
    		background-image:url('<?php echo Yii::app()->baseUrl; ?>/images/gray_jean.png');
    	}
    	.ddcdcontent{
    		margin-top: 75px;
    	}
    	.avans-text{
    		color: #C6002A;
    		font-weight: bold;
    	}
    	.nav-list > li > a {
    		color: #81001C;
    	}
		div#contentContainer {
			border-radius: 15px;
			border: 1px solid #E3E3E3;
			background-color:#fafafa;
			margin-left:10px;
			padding:20px 0px 20px 0px;
		}
    </style>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container-fluid" id="page">



			<?php require_once('nav_horizontal.php'); ?>


	
			<div class="span3 ddcdcontent">
				<?php require_once('nav_vertical.php'); ?>
			</div>
			

			<div id="contentContainer" class="span12 ddcdcontent">
			
			<?php if(Yii::app()->user->hasFlash('success')):?>
				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('success'); ?>
				</div>
			<?php endif; ?>
			<?php if(Yii::app()->user->hasFlash('error')):?>
				<div class="flash-error">
					<?php echo Yii::app()->user->getFlash('error'); ?>
				</div>
			<?php endif; ?>
			<?php if(Yii::app()->user->hasFlash('notice')):?>
				<div class="flash-notice">
					<?php echo Yii::app()->user->getFlash('notice'); ?>
				</div>
			<?php endif; ?>
			
				<div style="margin-left:10px;margin-right:10px;">
					<?php if(isset($this->breadcrumbs)):?>
						<?php /* $this->widget('zii.widgets.CBreadcrumbs', array(
							 'links'=>$this->breadcrumbs,
						)); */ ?><!-- breadcrumbs -->
					<?php endif?>
				
						<?php echo $content; ?>
				</div>
			</div>
		
			<div class="clear"></div>
		

		
		<div class="row span12">
			<footer>
				<hr>
				<p class="pagination-centered muted"> <?php echo Yii::t('main', 'For questions') ?> <a href="mailto:ddcd@avans.nl"> <?php echo Yii::t('main', 'mail us') ?> </a></p>
			</footer>
		</div>
	</div><!-- container -->

</body>
</html>
