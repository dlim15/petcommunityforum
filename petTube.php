<?php
include("menu.php");
?>
<img class="boardImage" src="img/main_petube.png" alt="main_petube.png" />
<div id="post" class="postPetTube">
	<?php
		include("postAndSearch.php");
	?>
</div>
<input type="hidden" id="idVal" value="<?=$id?>"/>
<div id="filteredResult">
</div>
</div>
<script type="text/javascript" src="searchingFunction.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#notTube").hide();
	searching("tube", 3, "", $("#idVal").val());
	$("#searchButton").click(function(){
		if($("#search").val() == "")
			alert("Search cannot be empty.");
		else
			searching("tube", $("#searchFor").val(), $("#search").val(), $("#idVal").val());
		
	});
	$(".newPost").click(function(){
		<?php
		if($isLogIn){
		?>
		window.location = "<?=$urls[13]?>";
		
		<?php	
		}
		else{
		?>
		alert("Please log in first to post.");
		window.location = "login.php";
		<?php
		}
		?>
		
	});
});
</script>
</body>
</html>