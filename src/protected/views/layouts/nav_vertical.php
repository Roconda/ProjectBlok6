
<div class="well">
	<?php 
	// @TODO dingen die niet visible zijn gemaakt kunnen nog wel benaderd worden.
	//		In de view moet dus ook gecheckt worden of een gebruik het wel mag zien(Gebaseerd op RBAC?).
	$this->widget('bootstrap.widgets.TbMenu',array(
		'type' => 'list',
		'items'=>array(
			array('label'=>'Home', 'icon' => 'home', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'Traject', 'icon' => 'random', 'url'=>array('/traject'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'Course', 'icon' => 'tag', 'url'=>array('/course'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'Course offer', 'icon' => 'hand-right', 'url'=>array('/courseoffer'), 'visible'=>!Yii::app()->user->isGuest),
			array('label'=>'Location', 'icon' => 'globe', 'url'=>array('/location'), 'visible'=>!Yii::app()->user->isGuest),
			//array('label'=>'User management', 'url'=>array('/user/user/admin'), 'visible'=>Yii::app()->user->isAdmin() ),
			array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest, 'visible' => Yii::app()->user->isGuest),
			//array('label'=>'Profile', 'url'=>array('/user/user/profile'), 'visible'=>!Yii::app()->user->isGuest),
			//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
	)); ?>
</div>