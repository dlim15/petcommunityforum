<?php
include("newPostBase.php");
?>
			Status : 
			<label><input type="radio" name="status" value="true" required /> missing </label>
			<label><input type="radio" name="status" value="false"/> found </label> <br>
			Pet's age :
			<input type="text" class="numberOnly" name="age" size="2" id="age" maxlength="2" required /> <br>
			Lost Date :
			<input type="date" name="lostDate" required /><br>
			<input type="text" name="whichPost" value="lost" class="hiddenValues" />
			<input type="submit" value="Post" />
		</form>
	</div>
</div>
</body>
</html>