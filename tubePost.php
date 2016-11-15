<?php
include("menu.php");

?>
<div id="newPost">
		<form method="post" action="post_sql.php" id="postField" enctype="multipart/form-data">
			<input type="text" name="id" class="hiddenValues" value="<?=$id?>" />
			Subject : <input type="text" name="subject" id="subject" required/> <br>
			Description: <br>
			<textarea name="description" id="description" required > </textarea> <br>
			Video to post (.mp4 only):
			<input type="file" name="attachedFile" required /><br>
			<input type="text" name="whichPost" value="petTube" class="hiddenValues" />
			<input type="submit" value="Post" />
		</form>
	</div>
</div>
</body>
</html>