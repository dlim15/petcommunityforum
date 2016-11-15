<select name="breed" id="breed" required>
<?php
	$sql="SELECT Breed_num,Name FROM pet_breed;";
	$query=$db->prepare($sql);
	$query->execute();
	$rows = $query->fetchAll();
	
	foreach($rows as $row){
		$b_num = $row['Breed_num'];
		$b_name = $row['Name'];
		
	
	?>
	<option value="<?=$b_num?>"> <?=$b_name?> </option>
	<?php
	}
	?>
</select>
