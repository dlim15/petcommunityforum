<?php
include("menu.php");
?>
<img class="boardImage" src="img/main_Adoption.png" alt="main_Adoption.png" />
<div id="post" class="postUserAdoption">
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
	searching("adopt", 3, "", $("#idVal").val());
	$("#searchButton").click(function(){
		if($("#search").val() == "" && $("#searchFor").val()!=1){
			alert("Search cannot be empty.");
		}else{
			searching("adopt", $("#searchFor").val(), ($("#searchFor").val() == 1 ? $("#breed").val() : $("#search").val()), $("#idVal").val());
		}
	});
	$(".newPost").click(function(){
		<?php
		if($isLogIn){
		?>
		window.location = "<?=$urls[8]?>";
		
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