<button class="newPost"> Post new </button>
	<div class="right">
			<select id="searchFor">
				<option value="0">Subject+contents</option>
				<option id="notTube" value="1">Breed</option>
				<option value="2">User id</option>
			</select>
			<input type="text" id="search" />
			<?php
			include("breedGenerator.php");
			?>
			<button id="searchButton"> search </button>
	</div>