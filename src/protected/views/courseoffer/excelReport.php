<?php if ($model !== null):?>
<table border="1">

	<tr>
 		<th><?php echo Yii::t('courseoffer','Course'); ?></th>
 		<th><?php echo Yii::t('courseoffer','Location'); ?></th>
		<th><?php echo Yii::t('courseoffer','Year'); ?></th>
		<th><?php echo Yii::t('courseoffer','Block'); ?></th>  
		<th><?php echo Yii::t('courseoffer','Physical'); ?></th>
		<th><?php echo Yii::t('courseoffer','Frozen'); ?></th> 
		<th><?php echo Yii::t('courseoffer','Required'); ?></th>  
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
		<td>
			<?php echo $row->description; ?>
		</td>
		<td>
			<?php //echo $row->location; ?>
		</td>
		<td>
			<?php //echo $row->year; ?>
		</td>
		<td>
			<?php //echo $row->block; ?>
		</td>
		<td>
			<?php //echo $row->fysiek; ?>
		</td>
		<td>
			<?php //echo $row->blocked; ?>
		</td>
		<td>
			<?php //echo $row->required; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
