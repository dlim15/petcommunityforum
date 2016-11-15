<?php
include("menu.php");

?>
<script  type="text/javascript">
$(document).ready(function(){
	$('#breed').select2();
	$('#postField').on('submit', function(){
		if($("#zip").val().length != 5){
			$("#zipWarning").html("Zipcode should be length of 5").show().fadeOut("slow");
			return false;
		}
		return true;
	});
});
</script>
	<div id="newPost">
		<form method="post" action="post_sql.php" id="postField" enctype="multipart/form-data">
			<input type="text" name="id" class="hiddenValues" value="<?=$id?>" />
			Subject : <input type="text" name="subject" id="subject" required/> <br>
			Pet's breed : 
			<?php
			include("breedGenerator.php");
			?><br>
			Pet's gender :
			<label><input type="radio" name="gender" value="Female" required/>Female</label>
			<label><input type="radio" name="gender" value="Male"/>Male </label><br>
			Zipcode :
			<input type="text" name="zipcode" id="zip" class="numberOnly" size="5" maxLength="5" required/>
			<span id="zipWarning" class="warningMessage"> </span><br>
			Description: <br>
			<textarea name="description" id="description" required > </textarea> <br>
			File to attach(Optional, JPEG ONLY) :
			<input type="file" name="attachedFile" /><br>