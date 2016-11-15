<?php
include("db_info.php");
function sendToDb($sql){
	global $db;
	try{
		$db->exec($sql);
	}catch(PDOException $e){
		echo $e->POSTMessage();
	}
}
function getFromDb($sql){
	global $db;
	$query = $db->prepare($sql);
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}
function saveFile($fileName, $postNum, $typeOfPost){
	$fileDir = $typeOfPost."File/";
				
	$tempFile = explode(".",$_FILES[$fileName]['name']);
	$newFileName = $postNum.".".end($tempFile);
	$uploaded = $fileDir.$newFileName;
	
	if(move_uploaded_file($_FILES[$fileName]['tmp_name'],$uploaded )){
		print "Uploaded!\n".$uploaded;
		return $uploaded;
	}
	else{
		return "";
	}
	
	/*if ($_FILES[$fileName]['error'] === UPLOAD_ERR_OK) {
		print "yes";
	} else {
    die("Upload failed with error code " . $_FILES[$fileName]['error']);
	}*/
}
?>