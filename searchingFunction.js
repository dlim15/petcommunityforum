	$("#breed").hide();
	$("#searchFor").change(function(){
		if($(this).val()==1){
			$("#search").hide();
			$("#breed").show();
		}else{
			$("#search").show();
			$("#breed").hide();
		}
	});
	function searching(type, searchFor, searchVal, id){
		if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				$("#filteredResult").html(xmlhttp.responseText);
			}
			};
			
			xmlhttp.open("GET", type+"SearchFilter.php?id="+id+"&type="+type+"&sFor="+searchFor+"&sVal="+searchVal, true);
			xmlhttp.send();
	}