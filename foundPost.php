<?php
include("newPostBase.php");
?>
			Status : 
			<label><input type="radio" name="status" value="false" required /> not returned </label>
			<label><input type="radio" name="status" value="true"/> returned </label> <br>
			Found Date :
			<input type="date" name="foundDate" required /><br>
			<input type="text" name="whichPost" value="found" class="hiddenValues" />
			<input type="submit" value="Post" />
		</form>
	</div>
</div>
</body>
</html>