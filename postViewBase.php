<?php
include("menu.php");
include("sqlRelated.php");
$pId=$_REQUEST['pId'];
$type=$_REQUEST['type'];
?>
	
	<table id="posted">
		<?php
			$result = typeDetermine($type);
		?>
		<tr>
			<td class="caseOne">
				Subject:
			</td>
			<td class="caseOneContents">
				<?=$result['Subject']?>
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Breed:
			</td>
			<td class="caseOneContents">
				[<?=$result['name']?>]
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				User id:
			</td>
			<td class="caseOneContents">
				<?=$result['User_id']?>
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Gender:
			</td>
			<td class="caseOneContents">
				[<?=$result['Pet_gender']?>]
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Zipcode:
			</td>
			<td class="caseOneContents">
				[<?=$result['Zip_code']?>]
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Posted date:
			</td>
			<td class="caseOneContents">
				[<?=$result['post_date']?>]
			</td>
		</tr>
		<?php
			if($type == 0){
		?>
		<tr>
			<td class="caseOne">
				Availability:
			</td>
			<td class="caseOneContents">
				[<?=$result['Availability'] ? "Available" : "taken"?>]
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Price:
			</td>
			<td class="caseOneContents">
				<?=money_formatting($result['Price'])?>
			</td>
		</tr>
		<?php
			}
			else if($type == 1){
		?>
		<tr>
			<td class="caseOne">
				Missing :
			</td>
			<td class="caseOneContents">
				[<?=$result['isMissing'] ? "Missing" : "Found"?>]
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Missing Date:
			</td>
			<td class="caseOneContents">
				<?=$result['Lost_date']?>
			</td>
		</tr>
		<?php
			}
			else if($type == 2){
		?>
		<tr>
			<td class="caseOne">
				Returned :
			</td>
			<td class="caseOneContents">
				[<?=$result['isReturned'] ? "Returned" : "Not returned"?>]
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Found Date:
			</td>
			<td class="caseOneContents">
				<?=$result['Found_date']?>
			</td>
		</tr>
		<?php
			}else if($type == 3){	
		?>
		<tr>
			<td class="caseOne">
				User rate :
			</td>
			<td class="caseOneContents">
				<?=$result['Care_rate']?>
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				Daily Cost :
			</td>
			<td class="caseOneContents">
				<?=money_formatting($result['Daily_cost'])?>
			</td>
		</tr>
		<?php
			}
			else{
		?>
		<tr>
			<td class="caseOne">
				Start Date :
			</td>
			<td class="caseOneContents">
				<?=$result['Start_date']?>
			</td>
		</tr>
		<tr>
			<td class="caseOne">
				End Date :
			</td>
			<td class="caseOneContents">
				<?=$result['End_date']?>
			</td>
		</tr>
		<?php
			}
			?>
		<tr>
			<td colspan="4" class="caseTwo">
				<?php 
					echo nl2br($result['Description']);

				if($result['File_path']!=""){
				?>
					<br><img src="<?=$result['File_path']?>" id="postPic" alt="<?=$result['File_path']?>"/>
				<?php
				}
				?>
			</td>
		</tr>
	</table>
<?php
function money_formatting($amount) {
    return "$".number_format($amount, 2, '.', ',');
}
function folderDetermine($type){
	$folder="";
	switch ($type){
		case 0:
			$folder="adoption";
			break;
		case 1:
			$folder="lost";
			break;
		case 2:
			$folder="found";
			break;
		case 3:
			$folder="care";
			break;
		case 4:
			$folder="cared";
			break;
		default:
			break;	
	}
	$folder .= "File";
	return $folder;
}
function typeDetermine($type){
	
	switch ($type){
		case 0:
			return adoptionPost();
		case 1:
			return lostPost();
		case 2:
			return foundPost();
		case 3:
			return carePost();
		case 4:
			return caredPost();
			
	}
}
function adoptionPost(){
	global $pId;
	$sql="SELECT A.Availability, A.Price, P.Zip_code, P.Pet_gender, P.Description, P.Subject, B.name, P.User_id, P.post_date, P.File_path
			FROM adoption A, post P, pet_breed B 
			WHERE A.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num AND P.Post_id = ".$pId.";";
	$result = getFromDb($sql);
	return $result[0];
}
function lostPost(){
	global $pId;
	$sql="SELECT L.Lost_post_id, L.Lost_date, L.isMissing, P.Zip_code, P.Pet_gender, P.Description, P.Subject, B.name, P.User_id, P.post_date, P.File_path
			FROM lost L, post P, pet_breed B 
			WHERE L.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num AND P.Post_id = ".$pId.";";
	$result = getFromDb($sql);
	return $result[0];
}
function foundPost(){
	global $pId;
	$sql="SELECT F.Found_post_id, F.isReturned, F.Found_date, P.Zip_code, P.Pet_gender, P.Description, P.Subject, B.name, P.User_id, P.post_date, P.File_path
			FROM found F, post P, pet_breed B 
			WHERE F.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num AND P.Post_id = ".$pId.";";
	$result = getFromDb($sql);
	return $result[0];
}
function carePost(){
	global $pId;
	$sql="SELECT C.Care_post_id, C.Daily_cost, U.Care_rate,  P.Zip_code, P.Pet_gender, P.Description, P.Subject, B.name, P.User_id, P.post_date, P.File_path
			FROM care C, post P, pet_breed B, users U
			WHERE C.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num AND P.User_id=U.User_id AND P.Post_id = ".$pId.";";
	$result = getFromDb($sql);
	return $result[0];
}
function caredPost(){	
	global $pId;
	$sql="SELECT C.Cared_post_id, P.Zip_code, P.Pet_gender, P.Description, P.Subject, B.name, P.User_id, P.post_date, C.Start_date, C.End_date, P.File_path
			FROM cared C, post P, pet_breed B 
			WHERE C.Post_id = P.Post_id AND P.Pet_breed = B.Breed_num AND P.Post_id = ".$pId.";";
	$result = getFromDb($sql);
	return $result[0];
}
?>
</div>
</body>
</html>