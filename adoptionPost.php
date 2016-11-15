<?php
include("newPostBase.php");
?>
			Status : 
			<label><input type="radio" name="status" value="TRUE" required /> Available</label>
			<label><input type="radio" name="status" value="FALSE"/> Taken</label> <br>
			Pet's age :
			<input type="text" class="numberOnly" name="age" size="2" id="age" maxlength="2" required /> <br>
			Price :
			<input type="text" class="moneyAmount" name="price" id="price" required /><br>
			<input type="text" name="whichPost" value="adoption" class="hiddenValues" />
			<input type="submit" id="submitPost" value="Post" />
		</form>
	</div>
</div>
</body>
</html>