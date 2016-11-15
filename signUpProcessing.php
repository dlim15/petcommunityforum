<?php
include("sqlRelated.php");
$log = array();
$sql = "SELECT * FROM users WHERE User_id='".$_POST['id']."';";
$result = getFromDb($sql);
$isDuplicate = false;
if(!empty($result))
	$isDuplicate = true;
$log['dup'] = $isDuplicate;
echo json_encode($log);
?>