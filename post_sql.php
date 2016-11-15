<?php
include('menu.php');
include('sqlRelated.php');

$type="";
$which = $_POST['whichPost'];
$pId="";
if($which=="adoption"){
	insertAdoption();
	$type=0;
}
else if($which=="lost"){
	insertLost();
	$type=1;
}
else if($which=="found"){
	insertFound();
	$type=2;
}
else if($which=="care"){
	insertCare();
	$type=3;
}
else if($which=="cared"){
	insertCared();
	$type=4;
}
$url = "postViewBase.php?id=".$id."&pId=".$pId."&type=".$type;

if($which=="petTube"){
	insertTube();
	$url = "tubePostView.php?id=".$id."&pId=".$pId;
}
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
?>
	</div>
</body>
</html>
<?php
function basicSql(){
	global $id;
	global $which;
	global $pId;
	$getpIdSql = "SELECT MAX(Post_id)+1 pId FROM post;";
	$result = getFromDb($getpIdSql);
	$pId = $result[0]['pId'];
	$sql = "INSERT INTO post(User_id, Zip_code, Pet_breed, Pet_gender, Description, Subject, File_path) 
			VALUES ('".$id."', ".$_POST['zipcode'].", ".$_POST['breed'].", '" .$_POST['gender']."', '"
			.$_POST['description']."', '".$_POST["subject"]."', '".saveFile('attachedFile',$pId, $which)."'); "
			."SELECT @max_post_id := MAX(Post_id) FROM post; ";
	
	
	return $sql;
}
function createSqlAndSend($addionalSql){

	$sql = basicSql();
	$sql .= $addionalSql;
	sendToDb($sql);
	
	
}
function dateConvert($date){
	return date('Y-m-d', strToTime($date));
}

function insertAdoption(){
	$sql = "INSERT INTO adoption(Post_id, Price, Availability, Pet_age) 
			VALUES (@max_post_id, ".$_POST['price'].", ".$_POST['status'].", ".$_POST['age'].");";
	createSqlAndSend($sql);
}

function insertLost(){
	$sql =	"INSERT INTO lost(Post_id, Lost_date, isMissing, Pet_age) 
			VALUES (@max_post_id, '".dateConvert($_POST['lostDate'])."', ".$_POST['status'].", ".$_POST['age'].");";
	createSqlAndSend($sql);
}

function insertFound(){
	$sql =	"INSERT INTO found(Post_id, Found_date, isReturned) 
			VALUES (@max_post_id, '".dateConvert($_POST['foundDate'])."', ".$_POST['status'].");";
	createSqlAndSend($sql);
}
function insertCare(){
	$sql =	"INSERT INTO care(Post_id, Daily_cost) 
			VALUES (@max_post_id, ".$_POST['dailyCost'].");";
	createSqlAndSend($sql);
}
function insertCared(){
	$sql =	"INSERT INTO cared(Post_id, Start_date, End_date) 
			VALUES (@max_post_id, '".dateConvert($_POST['startDate'])."', '".dateConvert($_POST['endDate'])."');";
	createSqlAndSend($sql);
}
function insertTube(){
	global $id;
	global $which;
	global $pId;
	$getpIdSql = "SELECT MAX(Tube_Post_id)+1 pId FROM pet_tube";
	$result = getFromDb($getpIdSql);
	$pId = $result[0]['pId'];
	$sql = "INSERT INTO pet_tube(Title, Description, File_path, User_id) 
			VALUES ('".$_POST['subject']."','".$_POST['description']."', '".saveFile('attachedFile',$pId, $which)."', '".$id."')";
	sendToDb($sql);
}
?>