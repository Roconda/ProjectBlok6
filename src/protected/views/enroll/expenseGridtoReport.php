<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px"><?php echo Yii::t('enroll', 'Username'); ?></th>
 		<th width="80px"><?php echo Yii::t('enroll', 'Trail'); ?></th>
 		<th width="80px"><?php echo Yii::t('traject', 'Duration'); ?></th>
 		<th width="80px"><?php echo Yii::t('enroll', 'Start date'); ?></th>
		<th width="80px"><?php echo Yii::t('enroll', 'Completed'); ?></th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
		<td>
			<?php echo $row->user->username; ?>
		</td>
       		<td>
			<?php //echo $row->traject->description; ?>
		</td>
       		<td>
			<?php //echo $row->traject->duration; ?>
		</td>
       		<td>
			<?php //echo $row->startdate; ?>
		</td>
		<td>
			<?php echo $row->completed; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>