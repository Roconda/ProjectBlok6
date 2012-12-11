<div class="row">
	<div class="pull-right">
		<?php
		
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Create',
		    'type'=>'null',
		    'url' => array('create')
		));
		?>
		 
		&nbsp;
		
		<?php
		$this->widget('bootstrap.widgets.TbButton', array(
		    'label'=>'Manage',
		    'type'=>'null',
		    'url' => array('admin')
		));
		?>
	</div>
</div>