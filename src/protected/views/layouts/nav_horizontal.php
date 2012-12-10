<?php

$items = array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=> Yii::app()->getHomeUrl()),
            ),
        ),
    );

if(Yii::app()->user->isGuest)
	array_push($items, '<form class="navbar-form pull-right" action="'.Yii::app()->getHomeUrl().'/user/auth/login" method="post">
							<input type="text" class="span2" name="YumUserLogin[username]" placeholder="Username">
							<input type="text" class="span2" name="YumUserLogin[password]" placeholder="Password">
							<button type="submit" class="btn">Sign in</button>
						</form>');
else
	array_push($items, '<ul class="nav pull-right">
	              			<li><a class="disabled">Logged in as '. Yii::app()->user->name .'</a></li>
	              		</ul>');


$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=> '<span class="avans-text">'.CHtml::encode(Yii::app()->name).'</span>',
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=> $items
));

?>