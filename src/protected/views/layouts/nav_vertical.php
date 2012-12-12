
<div class="well">
	<?php 
	
	$items =array();

		
	if(!Yii::app()->user->isGuest) {
		array_push($items, array('label'=>'Dashboard', 'icon' => 'home', 'url'=>array('/dashboard')));
		array_push($items, array('label'=>'Traject', 'icon' => 'random', 'url'=>array('/traject')));
		array_push($items, array('label'=>'Course', 'icon' => 'tag', 'url'=>array('/course')));
		array_push($items, array('label'=>'Course offer', 'icon' => 'hand-right', 'url'=>array('/courseoffer')));
		array_push($items, array('label'=>'Location', 'icon' => 'globe', 'url'=>array('/location')));
		//array_push($items, array('label'=>'Profile', 'url'=>array('/user/user/profile')));
		array_push($items, '<hr>');
		array_push($items, array('label'=>'Logout', 'icon' => 'icon-off', 'url'=>array('/user/user/logout', 'class' => 'muted')));	
	}else
		array_push($items, array('label'=>'Login', 'url'=>array('/user/login')));
	
	// @TODO dingen die niet visible zijn gemaakt kunnen nog wel benaderd worden.
	//		In de view moet dus ook gecheckt worden of een gebruik het wel mag zien(Gebaseerd op RBAC?).
	$this->widget('bootstrap.widgets.TbMenu',array(
		'type' => 'list',
		'items' => $items
	)); ?>
</div>