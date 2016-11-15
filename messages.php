<?php
include("sqlRelated.php");
$mId = $_REQUEST["mId"];
$myId = $_REQUEST["myId"];
$otherId = $_REQUEST["otherId"];
?>

<!DOCTYPE html>
<html>	
	<head>
		<title> Message </title>
		<meta charset="utf-8"/>
		<link href="img/dogIcon.png" type="image/png" rel="shortcut icon" />
		<link href="message_design.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="messageFunction.js"></script>
		<script type="text/javascript">
			var messaging = new Messaging();
			$(document).ready(function(){
				$('html, body').scrollTop( $(document).height() );
				$('#messageCont').keyup(function(e){
					if(e.keyCode == 13){
						var text = $(this).val();
						if(text.length-1 >0){
							messaging.send(<?=$mId?>,"<?=$myId?>", "<?=$otherId?>", text.substr(0,text.length-1));
							$(this).val("");
						}else{
							$(this).val(text.substr(0,text.length-1));
						}
					}
				});
				$('#sendBtn').click(function(){
					if($("#messageCont").val().length!= 0)
						messaging.send(<?=$mId?>,"<?=$myId?>", "<?=$otherId?>", $('#messageCont').val());
						$('#messageCont').val("");
				});
			});
			
		</script>
	</head>
	<body onload="setInterval('messaging.update(<?=$mId?>,\'<?=$myId?>\')',1000);">
	<div class="messageLayout">
		<H2 id="messageTitle">
		MESSAGE WITH <?=$otherId?>
		</H2>
		<div id="messageBubble">
		<?php
			$sql="SELECT * 
			FROM messages 
			WHERE Message_id=".$mId." 
			ORDER BY receivedTime ASC;";
			$result = getFromDb($sql);
			if(!empty($result)){
				foreach($result as $message){
					$sender = $message['Sender'];
					$contents = $message['Contents'];
					$time = $message['receivedTime'];
					if($sender == $myId){
						?>
						<p id="send" class="message"><?=$contents?></p>
						<p id="timeFSend"><?=$time?></p>
						<?php
					}
					else{
						?>
						<p id="receive" class="message"><?=$contents?></p>
						<p><?=$time?></p>
						<?php
					}?>
					
					<div class="spacer"></div>
					<?php
				}
			}
		?>
		</div>
	</div>
	<div class="bot">
	<textarea id="messageCont"></textarea>
	<button id="sendBtn">Send</button>
	</div>
	
	

</body>
</html>