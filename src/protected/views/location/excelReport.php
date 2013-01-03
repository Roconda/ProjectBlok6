<?php if ($model !== null):?>
<table border="1">
	<tr>
 		<th width="80px"><?php echo Yii::t('location', 'Description'); ?></th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
       	<td>
			<?php echo $row->description; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>
