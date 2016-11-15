<?php
include("menu.php");
include("sqlRelated.php");
$pId=$_REQUEST['pId'];
?>
	
	<table id="posted">
		<?php
			$sql = "SELECT Tube_post_id, Title,User_id, Description, Post_time, File_path FROM pet_tube WHERE Tube_post_id=".$pId.";";
			$result = getFromDb($sql);
		?>
		<tr>
			<td class="caseOne">
				Subject:
			</td>
			<td class="caseOneContents">
				<?=$result[0]['Title']?>
			</td>
		</tr>
		
		<tr>
			<td class="caseOne">
				User id:
			</td>
			<td class="caseOneContents">
				<?=$result[0]['User_id']?>
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Posted date:
			</td>
			<td class="caseOneContents">
				[<?=$result[0]['Post_time']?>]
			</td>
		</tr>
		<tr>
			<td colspan="4" class="caseTwo">
				<video id="tubeVideo" controls>
					<source src="<?=$result[0]['File_path']?>" type="video/mp4">  
					your browser does not support .mp4
				</video><br>
				<?php 
					echo nl2br($result[0]['Description']);
				?>
			</td>
		</tr>
		
	</table>
</div>
</body>
</html>