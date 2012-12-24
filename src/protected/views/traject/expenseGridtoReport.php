<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      duration		</th>
 		<th width="80px">
		      nrcourses		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
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
