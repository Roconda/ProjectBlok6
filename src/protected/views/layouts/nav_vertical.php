
<div class="well">
	<?php $this->widget('bootstrap.widgets.TbMenu',array(
		'type' => 'list',
		'items'=>array(
			array('label'=>'Home', 'url'=>array('/site/index')),
			array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
			array('label'=>'User management', 'url'=>array('/user/user/admin')),
			array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
	)); ?>
</div>