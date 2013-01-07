<?php if ($model !== null):?>
<table border="1">
	<tr>
		<th width="80px"><?php echo Yii::t('enroll', 'Username'); ?></th>
 		<th width="80px"><?php echo Yii::t('traject', 'Trail'); ?></th>
 		<th width="80px"><?php echo Yii::t('enroll', 'Location'); ?></th>
		<th width="80px"><?php echo Yii::t('enroll', 'Completed'); ?></th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
		<td>
			<?php echo $row->user->username; ?>
		</td>
		<td>
			<?php echo $row->courseoffer->course->description; ?>
		</td>
		<td>
			<?php echo ($row->courseoffer->location == null ? '' : $row->courseoffer->location->description); ?>
		</td>
		<td>
			<?php echo Enroll::model()->getCompleted($row->completed); ?>
		</td>
	</tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>