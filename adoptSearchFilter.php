<?php
include("sqlRelated.php");
$id=$_GET['id'];
$idHref = "";
if(!empty($id))
	$idHref = "id=".$id."&";

?>
<table id="board" class="adoptionUser">
	<tr>
		<th>
			post num.
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
			Price
		</th>
		<th>
			Author
		</th>
		<th>
			Post date
		</th>
	</tr>
	<?php
		$searching = array();
		$searching[0] = "AND (P.Subject LIKE '%".$_GET["sVal"]."%' OR P.Description LIKE '%".$_GET["sVal"]."%') ";
		$searching[1] = "AND P.Pet_breed=".$_GET["sVal"]." ";
		$searching[2] = "AND P.User_id LIKE '%".$_GET["sVal"]."%' ";
		$searching[3] = "";
		
		$sql="SELECT P.Post_id, A.Adopt_post_id, A.Availability, P.Subject, B.name, A.Price, P.User_id, P.post_date 
			FROM adoption A, post P, pet_breed B 
			WHERE A.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num ".$searching[$_GET['sFor']]."
			ORDER BY A.Adopt_post_id DESC;";
		
		$rows = getFromDb($sql);
		
		foreach($rows as $row){
			$pId = $row['Post_id'];
			$postId = $row['Adopt_post_id'];
			$availablility = $row['Availability'] == 1 ? "[Available]" : "[Taken]";
			$subject = $row['Subject'];
			$breed = $row['name'];
			$price = $row['Price'];
			$userId = $row['User_id'];
			$post_date = $row['post_date'];
			?>
	<tr>
		<td>
			<?=$postId?>
		</td>
		<td>
			<?=$availablility?>
		</td>
		<td class="longer">
			<a href="postViewBase.php?<?=$idHref?>pId=<?=$pId?>&type=0"><?=$subject?></a>
		</td>
		<td>
			<?=$breed?>
		</td>
		<td>
			$<?=$price?>
		</td>
		<td>
			<?=$userId?>
		</td>
		<td>
			<?=$post_date?>
		</td>
	</tr>
	<?php
	}
	?>
</table>