<?php if ($model !== null):?>
<table border="1">
	<tr>
		<th><?php echo Yii::t('assign', 'Username'); ?></th>
 		<th><?php echo Yii::t('assign', 'Trail'); ?></th>
 		<th><?php echo Yii::t('assign', 'Duration'); ?></th>
 		<th><?php echo Yii::t('assign', 'Startdate'); ?></th>
		<th><?php echo Yii::t('assign', 'completed'); ?></th>
		<th><?php echo Yii::t('assign', 'Notes'); ?></th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
		<td>
			<?php echo $row->user->username; ?>
		</td>
       		<td>
			<?php echo $row->traject->description; ?>
		</td>
		<td>
			<?php echo $row->traject->duration; ?>
		</td>
		<td>
			<?php echo $row->startdate; ?>
		</td>
		<td>
			<?php echo Enroll::model()->getCompleted($row->completed); ?>
		</td>
		<td>
			<?php echo $row->notes; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>