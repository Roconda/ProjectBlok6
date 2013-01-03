<?php if ($model !== null):?>
<table border="1">
	<tr>
 		<th width="80px"><?php echo Yii::t('course', 'Description'); ?></th>
 		<th width="80px"><?php echo Yii::t('course', 'Required'); ?></th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
		<td>
			<?php echo $row->description; ?>
		</td>
		<td>
			<?php echo $row->required; ?>
		</td>
	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
