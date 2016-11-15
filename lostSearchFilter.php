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
			Lost Zip
		</th>
		<th>
			Author
		</th>
		<th>
			Lost date
		</th>
	</tr>
	<?php
		$searching = array();
		$searching[0] = "AND (P.Subject LIKE '%".$_GET["sVal"]."%' OR P.Description LIKE '%".$_GET["sVal"]."%') ";
		$searching[1] = "AND P.Pet_breed=".$_GET["sVal"]." ";
		$searching[2] = "AND P.User_id LIKE '%".$_GET["sVal"]."%' ";
		$searching[3] = "";
		
		$sql="SELECT P.Post_id, L.Lost_post_id, L.Lost_date, L.isMissing, P.Subject, B.name, P.User_id, P.zip_code 
			FROM lost L, post P, pet_breed B 
			WHERE L.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num ".$searching[$_GET['sFor']]."
			ORDER BY L.Lost_post_id DESC;";
		$rows = getFromDb($sql);
		
		foreach($rows as $row){
			$pId = $row['Post_id'];
			$postId = $row['Lost_post_id'];
			$missing = $row['isMissing'] == 1 ? "[Missing]" : "[Found]";
			$subject = $row['Subject'];
			$breed = $row['name'];
			$lost_date = $row['Lost_date'];
			$userId = $row['User_id'];
			$zip_code = $row['zip_code'];
			?>
	<tr>
		<td>
			<?=$postId?>
		</td>
		<td>
			<?=$missing?>
		</td>
		<td class="longer">
			<a href="postViewBase.php?<?=$idHref?>pId=<?=$pId?>&type=1"><?=$subject?></a>
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
			<?=$lost_date?>
		</td>
	</tr>
	<?php
	}
	?>
</table>