<?php
include("sqlRelated.php");
$id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Message </title>
		<meta charset="utf-8"/>
		<link href="img/dogIcon.png" type="image/png" rel="shortcut icon" />
		<link href="message_design.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="messageFunction.js"> </script>
		<script type="text/javascript">
		var messaging = new Messaging();
		$(document).ready(function(){
			$('#openMessage').click(function(){
				messaging.load("<?=$id?>",$('#userList').val());
			});
		});
		</script>
	
	</head>
	<body>
	<div class="messageLayout">
	<div class="cent">
	<select id="userList" name="userList">
		<?php
			$sql = "SELECT User_id FROM users WHERE User_id!='".$id."';";
			$result = getFromDb($sql);
			foreach($result as $userId){
			?>
			<option value="<?=$userId['User_id']?>"><?=$userId['User_id']?></option>
		<?php
			}
		?>
	</select>
	<button id="openMessage">Send a message</button><br>

			Open Conversation With:
	<div class="msgWith">
	<ul>
	<?php
		$sql = "SELECT * 
				FROM message_box 
				WHERE My_id='".$id."' OR Other_id='".$id."';";
		$result = getFromDb($sql);
		if(!empty($result)){
			foreach($result as $chats){
				$my = $chats['My_id'];
				$other = $chats['Other_id'];
				$mId = $chats['Message_id'];
				?>
				<li>
				<?php
				if($my != $id){
					?>
				
							<a href="messages.php?myId=<?=$other?>&otherId=<?=$my?>&mId=<?=$mId?>"><?=$my?></a>
					
					<?php
				}
				else{
					?>
							<a href="messages.php?myId=<?=$my?>&otherId=<?=$other?>&mId=<?=$mId?>"><?=$other?></a>

					<?php
				}
				?>
				</li>
				<?php
			}
		}
	?>
	</ul>
	</div>
	</div>
	</div>
</body>
</html>