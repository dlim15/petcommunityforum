<?php
include("sqlRelated.php");
$id=$_GET['id'];
$idHref = "";
if(!empty($id))
	$idHref = "id=".$id."&";
?>
<table id="board" class="careCared">
	<tr>
		<th>
			Post num.
		</th>
		<th class="longer">
			Subject
		</th>
		<th>
			Breed
		</th>
		<th>
			Zipcode
		</th>
		<th>
			Author
		</th>
		<th>
			Start date
		</th>
		<th>
			End date
		</th>
	</tr>
	<?php
		$searching = array();
		$searching[0] = "AND (P.Subject LIKE '%".$_GET["sVal"]."%' OR P.Description LIKE '%".$_GET["sVal"]."%') ";
		$searching[1] = "AND P.Pet_breed=".$_GET["sVal"]." ";
		$searching[2] = "AND P.User_id LIKE '%".$_GET["sVal"]."%' ";
		$searching[3] = "";
		$sql="SELECT P.Post_id, C.Cared_post_id, P.Subject, B.name, P.User_id, P.zip_code, C.Start_date, C.End_date
			FROM cared C, post P, pet_breed B 
			WHERE C.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num ".$searching[$_GET['sFor']]."
			ORDER BY C.Cared_post_id DESC;";
		$rows = getFromDb($sql);
		
		foreach($rows as $row){
			$pId = $row['Post_id'];
			$postId = $row['Cared_post_id'];
			$subject = $row['Subject'];
			$breed = $row['name'];
			$userId = $row['User_id'];
			$zip_code = $row['zip_code'];
			$start_Date = $row['Start_date'];
			$end_Date = $row['End_date'];
			?>
	<tr>
		<td>
			<?=$postId?>
		</td>
		<td class="longer">
			<a href="postViewBase.php?<?=$idHref?>pId=<?=$pId?>&type=4"><?=$subject?></a>
		</td>
		<td>
			<?=$breed?>
		</td>
		<td>
			<?=$zip_code?>
		</td>
		<td>
			<?=$userId?>
		</td>
		<td>
			<?=$start_Date?>
		</td>
		<td>
			<?=$end_Date?>
		</td>
	</tr>
	<?php
	}
	?>
</table>