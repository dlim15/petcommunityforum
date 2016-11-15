<?php
include("sqlRelated.php");
$id=$_GET['id'];
$idHref = "";
if(!empty($id))
	$idHref = "id=".$id."&";
?>
<table id="board" class="petTube">
	<tr>
		<th>
			Post num.
		</th>
		<th class="longer">
			Subject
		</th>
		<th>
			Author
		</th>
		<th>
			Upload date
		</th>
	</tr>
	<?php
		$searching = array();
		$searching[0] = "WHERE (Title LIKE '%".$_GET["sVal"]."%' OR Description LIKE '%".$_GET["sVal"]."%') ";
		$searching[1] = "";
		$searching[2] = "WHERE User_id LIKE '%".$_GET["sVal"]."%' ";
		$searching[3] = "";
		$sql=	"SELECT Tube_post_id, Title, Post_time, User_id 
				FROM pet_tube ".$searching[$_GET['sFor']]."
				ORDER BY Tube_post_id DESC;";
		$rows = getFromDb($sql);
		
		foreach($rows as $row){
			$postId = $row['Tube_post_id'];
			$subject = $row['Title'];
			$post_date = $row['Post_time'];
			$userId = $row['User_id'];
			?>
	<tr>
		<td>
			<?=$postId?>
		</td>
		<td class="longer">
			<a href="tubePostView.php?<?=$idHref?>pId=<?=$postId?>"><?=$subject?></a>
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