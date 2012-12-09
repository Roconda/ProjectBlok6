
<div class="well">
	<?php $this->widget('bootstrap.widgets.TbMenu',array(
		'type' => 'list',
		'items'=>array(
			array('label'=>'Home', 'icon' => 'home', 'url'=>array('/site/index')),
			array('label'=>'Traject', 'icon' => 'random', 'url'=>array('/traject')),
			array('label'=>'Course', 'icon' => 'tag', 'url'=>array('/course')),
			array('label'=>'Course offer', 'icon' => 'hand-right', 'url'=>array('/courseoffer')),
			array('label'=>'Location', 'icon' => 'globe', 'url'=>array('/location')),
			array('label'=>'User management', 'url'=>array('/user/user/admin'), 'visible'=>Yii::app()->user->isAdmin() ),
			array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Profile', 'url'=>array('/user/user/profile'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
	)); ?>
</div>