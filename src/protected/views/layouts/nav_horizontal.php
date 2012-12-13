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
							<input type="password" class="span2" name="YumUserLogin[password]" placeholder="Password">
							<button type="submit" class="btn">Sign in</button>
						</form>');
else {
	array_push($items, '<ul class="nav pull-right">');
	array_push($items, '<li><a href="#">Settings</a></li>');
	array_push($items, '<li><a class="disabled">Logged in as '. Yii::app()->user->name .'</a></li>');
	array_push($items, '</ul>');
}

$items[] = array(
	'class' =>'ext.LanguagePicker.ELangPick',
//	array(
		//'excludeFromList' => array('en'), // list of languages to exclude from list
		'pickerType' => 'buttons',              // buttons, links, dropdown
		//'linksSeparator' => '<b> | </b>',   // if picker type is set to 'links'
		'buttonsSize' => 'mini',                // mini, small, large
		//'buttonsColor' => 'success',            // primary, info, success, warning, danger, inverse
//		)
//	)
);
						
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=> '<span class="avans-text">'.CHtml::encode(Yii::app()->name).'</span>',
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=> $items
));


?>