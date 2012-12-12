<div class="row">
	<div class="pull-right">
		<?php
		
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Create',
		    'type'=>'null',
		    'icon' => 'icon-plus',
		    'url' => array('create')
		));
		?>
		 
		&nbsp;
		
		<?php
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Overview',
		    'type'=>'null',
		    'icon' => 'icon-list',
		    'url' => array('index')
		));
		?>
	</div>
</div>