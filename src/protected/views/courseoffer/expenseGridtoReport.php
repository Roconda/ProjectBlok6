<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="20px">
		      id		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      location		</th>
		<th width="80px">
		      year		</th>
		<th width="80px">
		      block		</th>  
		<th width="80px">
		      fysiek		</th>
		<th width="80px">
		      blocked		</th> 
		<th width="80px">
		      required		</th>  
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
     <?php var_dump($row); endforeach; ?>
</table>
<?php endif; ?>
