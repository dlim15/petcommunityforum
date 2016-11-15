<?php
include("sqlRelated.php");
insertUser();
header('Refresh:2; URL="login.php");');
function insertUser(){
	$sql = "INSERT INTO users(User_id, Password, Last_name, First_name)
			VALUES ('".$_POST['userId']."','".$_POST['pWord']."','".$_POST['lName']."','".$_POST['fName']."');";
	sendToDb($sql);
	
}
?>