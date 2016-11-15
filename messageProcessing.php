<?php
include("sqlRelated.php");

	
	$function = $_POST['function'];
	
	$log = array();
	
	switch($function){
		case "load":
			$myId = $_POST['myId'];
			$otherId = $_POST['otherId'];
			$sql =	"SELECT Message_id, My_id, Other_id  
					FROM message_box 
					WHERE (My_id='".$myId."' AND Other_id='".$otherId."') 
					OR (My_id='".$otherId."' AND Other_id='".$myId."');";
			$result = getFromDb($sql);
			if(empty($result)){
				$otherSql = "INSERT INTO message_box(My_id, Other_id) 
						VALUES ('".$myId."','".$otherId."');";
				sendToDb($otherSql);
				$result = getFromDb($sql);
			}
			$mId = $result[0]['Message_id'];
			$log['mId']= $mId;
			break;
		case "update":
			$lastTime = $_POST['latestTime'];
			$contents = array();
			$latestTime = array();
			$sql="";
			$mId= $_POST['mId'];
			if(!empty($lastTime)){
				$sql = "SELECT Sender, Receiver, Contents, receivedTime FROM messages WHERE Message_id=".$mId." AND receivedTime > '".$lastTime."';";
				$result= getFromDb($sql);
				$sender = array();
				$receiver = array();
				$time = array();
				foreach($result as $newMessage){
					$contents[] = $newMessage['Contents'];
					$sender[] = $newMessage['Sender'];
					$receiver[] = $newMessage['Receiver'];
					$time[] = $newMessage['receivedTime'];
				}
				$log['sender'] = $sender;
				$log['receiver'] = $receiver;
				$log['time'] = $time;
			}
			$sql = "SELECT MAX(receivedTime) lastTime FROM messages WHERE Message_id=".$mId.";";
			$result=getFromDb($sql);
			$latestTime[] = $result[0]['lastTime'];
			if(is_null($result[0]['lastTime']))
				$latestTime[] = "";
			$log['contents'] = $contents;
			$log['latestTime'] = $latestTime;
			break;
		case "send":
			$sql = "INSERT INTO messages(Sender, Receiver, Message_id, Contents) 
				VALUES ('".$_POST['myId']."','".$_POST['otherId']."',".$_POST['mId'].",'".$_POST['message']."');";
			sendToDb($sql);
			break;

	}
	echo json_encode($log);
?>