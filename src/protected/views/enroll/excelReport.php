<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      firstname		</th>
 		<th width="80px">
		      lastname		</th>
 		<th width="80px">
		      course		</th>
 		<th width="80px">
		      location		</th>
		<th width="80px">
		      completed		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->user->profile->firstname; ?>
		</td>
       		<td>
			<?php echo $row->user->profile->lastname; ?>
		</td>
       		<td>
			<?php echo $row->courseoffer->course->description; ?>
		</td>
       		<td>
			<?php echo "NOGMAKEN"; /*$row->courseoffer->location->description;*/ ?>
		</td>
		<td>
			<?php echo $row->completed; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>