
<div class="well">
	<?php 
	
	$items =array();

	if(!Yii::app()->user->isGuest) {
		array_push($items, array('label'=>Yii::t('assign', 'Home'), 'icon' => 'home', 'url'=>array('/dashboard')));
		array_push($items, array('label'=>Yii::t('assign', 'Traject'), 'icon' => 'random', 'url'=>array('/traject'), 'visible' => (yii::app()->user->can('traject_read') || Yii::app()->user->isAdmin() )));
		array_push($items, array('label'=>Yii::t('assign', 'Course'), 'icon' => 'tag', 'url'=>array('/course'), 'visible' => yii::app()->user->can('course_read') || Yii::app()->user->isAdmin() ));
		array_push($items, array('label'=>Yii::t('assign', 'Course offer'), 'icon' => 'tags', 'url'=>array('/courseoffer'), 'visible' => yii::app()->user->can('courseoffer_read') || Yii::app()->user->isAdmin() ));
		array_push($items, array('label'=>Yii::t('assign', 'Location'), 'icon' => 'globe', 'url'=>array('/location'), 'visible' => yii::app()->user->can('location_read') || Yii::app()->user->isAdmin() ));
        array_push($items, array('label'=>Yii::t('assign', 'Enrolled'), 'icon' => 'tasks', 'url'=>array('/enroll'), 'visible' => yii::app()->user->can('enroll_read') || Yii::app()->user->isAdmin() ));
        array_push($items, array('label'=>Yii::t('assign', 'Assigned'), 'icon' => 'hand-right', 'url'=>array('/assign') ,'visible' => yii::app()->user->can('assign_read') || Yii::app()->user->isAdmin() ));
        array_push($items, array('label'=>Yii::t('assign', 'My Enrolls'), 'icon' => 'tasks', 'url'=>array('/enroll'), 'visible' => yii::app()->user->can('enroll_read_own')));
        array_push($items, array('label'=>Yii::t('assign', 'My Assigns'), 'icon' => 'hand-right', 'url'=>array('/assign') ,'visible' => yii::app()->user->can('assign_read_own')));
		array_push($items, array('label' =>Yii::t('assign', 'User management'), 'visible' => yii::app()->user->can('user_admin') ));
		array_push($items, array('label'=>Yii::t('assign', 'User Management'), 'icon' => 'user','url'=>array('/user/user/admin/'), 'visible' => Yii::app()->user->can('user_admin') || Yii::app()->user->isAdmin() ));
		array_push($items, '<hr>');
		array_push($items, array('label'=>Yii::t('assign', 'Logout'), 'icon' => 'icon-off', 'url'=>array('/user/user/logout', 'class' => 'muted')));	
	}else
		array_push($items, array('label'=>Yii::t('assign', 'Login'), 'url'=>array('/user/login')));
	
	// @TODO dingen die niet visible zijn gemaakt kunnen nog wel benaderd worden.
	//		In de view moet dus ook gecheckt worden of een gebruik het wel mag zien(Gebaseerd op RBAC?).
	$this->widget('bootstrap.widgets.TbMenu',array(
		'type' => 'list',
		'items' => $items
	)); ?>
</div>