<?php
include("menu.php");
?>
<img class="boardImage" src="img/main_Adoption.png" alt="main_Adoption.png" />
<div id="shelterAdopt">
	Choose the pet type :
	<label><input type="radio" id="petType" name="petType" value="dog" checked="checked"/> Dog</label>
	<label><input type="radio" id="petType" name="petType" value="cat" /> Cat</label> <br>
	Enter the Zipcode :
	<input type="text" class="numberOnly" id="zipcode" size="5" maxLength="5"/><span id="zipWarning" class="warningMessage"> </span><br>
	Select the range :
	<select id="range">
		<option value="35">less than 35 miles</option>
		<option value="50">less than 50 miles</option>
		<option value="75">less than 75 miles</option>
		<option value="100">less than 100 miles</option>
		<option value="250">less than 250 miles</option>
	</select><br>
	<button id="adoptSearch"> search </button> 
</div>
</div>
<script>
$(document).ready(function(){
	
	$('#adoptSearch').click(function(){
		if($("#zipcode").val().length != 5){
			$("#zipWarning").html("It should be length of 5!!!").show().fadeOut("slow");
		}else{
			window.open(urlMaker());
		}
		
	});
	function urlMaker(){
		var urls = ["http://www.adoptapet.com/dog-adoption/search/","http://www.adoptapet.com/cat-adoption/search/"];
		var zip = $('#zipcode').val();
		var range = $('#range').val();
		var chosen = $('input[name=petType]:checked').val() == "dog" ? 0:1;
		urls[chosen] += range + "/miles/" + zip;
		return urls[chosen];
	}
});
</script>
</body>
</html>