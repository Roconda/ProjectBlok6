

<?php $this->widget('bootstrap.widgets.TbMenu',array(
	'type' => 'list',
	'items'=>array(
		array('label'=>'Home', 'url'=>array('/site/index')),
		array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>'Contact', 'url'=>array('/site/contact')),
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
	),
)); ?>