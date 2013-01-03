<?php if ($model !== null):?>
<table border="1">

	<tr>
 		<th width="80px"><?php echo Yii::t('traject', 'Description'); ?></th>
 		<th width="80px"><?php echo Yii::t('traject', 'Duration'); ?></th>
 		<th width="80px"><?php echo Yii::t('traject', 'Number of courses'); ?></th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
		<td>
			<?php echo $row->description; ?>
		</td>
		<td>
			<?php echo $row->duration; ?>
		</td>
		<td>
			<?php echo $row->nrcourses; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
