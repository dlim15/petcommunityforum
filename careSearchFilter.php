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
		<th>
			Daily Cost
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
			Care rate
		</th>
	</tr>
	<?php
		$searching = array();
		$searching[0] = "AND (P.Subject LIKE '%".$_GET["sVal"]."%' OR P.Description LIKE '%".$_GET["sVal"]."%') ";
		$searching[1] = "AND P.Pet_breed=".$_GET["sVal"]." ";
		$searching[2] = "AND P.User_id LIKE '%".$_GET["sVal"]."%' ";
		$searching[3] = "";
		$sql="SELECT P.Post_id, U.Care_rate, C.Care_post_id, C.Daily_cost, P.Subject, B.name, P.User_id, P.zip_code, P.Post_date
			FROM care C, post P, pet_breed B , users U
			WHERE C.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num AND P.User_id=U.User_id ".$searching[$_GET['sFor']]."
			ORDER BY C.Care_post_id DESC;";
		$rows = getFromDb($sql);
		
		foreach($rows as $row){
			$pId = $row['Post_id'];
			$postId = $row['Care_post_id'];
			$dailyCost = $row['Daily_cost'];
			$subject = $row['Subject'];
			$breed = $row['name'];
			$userId = $row['User_id'];
			$zip_code = $row['zip_code'];
			$post_Date = $row['Post_date'];
			$care_Rate = $row['Care_rate'];
			?>
	<tr>
		<td>
			<?=$postId?>
		</td>
		<td>
			$<?=$dailyCost?>
		</td>
		<td class="longer">
			<a href="postViewBase.php?<?=$idHref?>pId=<?=$pId?>&type=3"><?=$subject?></a>
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
			<?=$care_Rate?>
		</td>
	</tr>
	<?php
	}
	?>
</table>