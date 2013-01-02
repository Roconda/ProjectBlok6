<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      Username</th>
 		<th width="80px">
		      Trail</th>
 		<th width="80px">
		      Duration</th>
 		<th width="80px">
		      startdate		</th>
		  <th width="80px">
		      completed		</th>
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
			<?php echo $row->completed; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>