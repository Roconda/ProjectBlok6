
<div class="well">
	<?php 
	
	$items =array();

	if(!Yii::app()->user->isGuest) {
		array_push($items, array('label'=>'Home', 'icon' => 'home', 'url'=>array('/dashboard')));
		array_push($items, array('label'=>'Traject', 'icon' => 'random', 'url'=>array('/traject'), 'visible' => (yii::app()->user->can('traject_read') || Yii::app()->user->isAdmin() )));
		array_push($items, array('label'=>'Course', 'icon' => 'tag', 'url'=>array('/course'), 'visible' => yii::app()->user->can('course_read') || Yii::app()->user->isAdmin() ));
		array_push($items, array('label'=>'Course offer', 'icon' => 'hand-right', 'url'=>array('/courseoffer'), 'visible' => yii::app()->user->can('courseoffer_read') || Yii::app()->user->isAdmin() ));
		array_push($items, array('label'=>'Location', 'icon' => 'globe', 'url'=>array('/location'), 'visible' => yii::app()->user->can('location_read') || Yii::app()->user->isAdmin() ));
        array_push($items, array('label'=>'Enrolled', 'icon' => 'globe', 'url'=>array('/enroll'), 'visible' => yii::app()->user->can('enroll_read') || Yii::app()->user->isAdmin() ));
        array_push($items, array('label'=>'Assigned', 'icon' => 'globe', 'url'=>array('/assign') ,'visible' => yii::app()->user->can('assign_read') || Yii::app()->user->isAdmin() ));
        array_push($items, array('label'=>'My Enrolls', 'icon' => 'globe', 'url'=>array('/enroll'), 'visible' => yii::app()->user->can('enroll_read_own')));
        array_push($items, array('label'=>'My Assigns', 'icon' => 'globe', 'url'=>array('/assign') ,'visible' => yii::app()->user->can('assign_read_own')));
		array_push($items, array('label' => 'GebruikersAdministratie', 'visible' => yii::app()->user->can('user_admin') ));
		array_push($items, array('label'=>'User Management', 'url'=>array('/user/user/admin'), 'visible' => Yii::app()->user->can('user_admin') || Yii::app()->user->isAdmin() ));
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