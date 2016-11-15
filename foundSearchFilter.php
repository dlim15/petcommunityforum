<?php
include("sqlRelated.php");
$id=$_GET['id'];
$idHref = "";
if(!empty($id))
	$idHref = "id=".$id."&";
?>
<table id="board" class="lostFound">
	<tr>
		<th>
			Post num.
		</th>
		<th>
			Status
		</th>
		<th class="longer">
			Subject
		</th>
		<th>
			Breed
		</th>
		<th>
			Found Zip
		</th>
		<th>
			Author
		</th>
		<th>
			Found date
		</th>
	</tr>
	<?php
		$searching = array();
		$searching[0] = "AND (P.Subject LIKE '%".$_GET["sVal"]."%' OR P.Description LIKE '%".$_GET["sVal"]."%') ";
		$searching[1] = "AND P.Pet_breed=".$_GET["sVal"]." ";
		$searching[2] = "AND P.User_id LIKE '%".$_GET["sVal"]."%' ";
		$searching[3] = "";
		
		$sql="SELECT P.Post_id, F.Found_post_id, F.isReturned, F.Found_date, P.Subject, B.name, P.User_id, P.zip_code 
			FROM found F, post P, pet_breed B 
			WHERE F.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num ".$searching[$_GET['sFor']]."
			ORDER BY F.Found_post_id DESC;";
		
		$rows = getFromDb($sql);
		
		foreach($rows as $row){
			$pId = $row['Post_id'];
			$postId = $row['Found_post_id'];
			$returned = $row['isReturned'] == 1 ? "[Returned]" : "[Not Returned]";
			$subject = $row['Subject'];
			$breed = $row['name'];
			$found_date = $row['Found_date'];
			$userId = $row['User_id'];
			$zip_code = $row['zip_code'];
			?>
	<tr>
		<td>
			<?=$postId?>
		</td>
		<td>
			<?=$returned?>
		</td>
		<td class="longer">
			<a href="postViewBase.php?<?=$idHref?>pId=<?=$pId?>&type=2"><?=$subject?></a>
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
			<?=$found_date?>
		</td>
	</tr>
	<?php
	}
	?>
</table>