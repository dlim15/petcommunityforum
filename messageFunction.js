
var message;
var latestTime = "";
function Messaging(){
	this.load = loadMessage;
	this.update = updateMessage;
	this.send = sendMessage;
	
}
function loadMessage(myId, otherId){
	
	$.ajax({
		type:"POST",
		url:"messageProcessing.php",
		data:{
			'function':'load',
			'myId':myId,
			'otherId':otherId
		},
		dataType:"json",
		success:function(data){
			window.location = "messages.php?myId="+myId+"&otherId="+otherId+"&mId="+data.mId;
		}
		
	});
}
function updateMessage(mId, myId){

	$.ajax({
		type:"POST",
		url:"messageProcessing.php",
		data:{
			'function':'update',
			'mId':mId,
			'latestTime':latestTime
		},
		dataType:"json",
		success:function(data){
			var dataSize = data.contents.length;
			if(dataSize > 0){
				for(var i=0; i<dataSize; i++){
					if(data.sender[i] == myId){
						$('#messageBubble').append("<p id=\"send\" class=\"message\">"+data.contents[i]+"</p>");
						$('#messageBubble').append("<p id=\"timeFSend\">"+data.time[i]+"</p>");
					}
					else{
						$('#messageBubble').append("<p id=\"receive\" class=\"message\">"+data.contents[i]+"</p>");
						$('#messageBubble').append("<p>"+data.time[i]+"</p>");
					}
					
					$('#messageBubble').append("<div class=\"spacer\"></div>");
					if(i == dataSize-1){
						latestTime = data.latestTime[i];
					}
				}
				
				$('html, body').scrollTop( $(document).height() );
			}else{
				latestTime = data.latestTime[0];
				
			}
		}
		
	});
}
function sendMessage(mId, myId, otherId, message){
	$.ajax({
		type:"POST",
		url:"messageProcessing.php",
		data:{
			'function':'send',
			'mId':mId,
			'myId':myId,
			'otherId':otherId,
			'message':message
		},
		dataType:"json",
		success:function(data){
			//updateMessage(mId, myId);
		}
	});
}
