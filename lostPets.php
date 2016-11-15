<?php
include("menu.php");
?>
<img class="boardImage" src="img/main_lost.png" alt="main_lost.png" />
<div id="post" class="postLostFound">
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
	searching("lost", 3, "", $("#idVal").val());
	$("#searchButton").click(function(){
		if($("#search").val() == "" && $("#searchFor").val()!=1){
			alert("Search cannot be empty.");
		}else{
			searching("lost", $("#searchFor").val(), ($("#searchFor").val() == 1 ? $("#breed").val() : $("#search").val()), $("#idVal").val());
		}
	});
	$(".newPost").click(function(){
		<?php
		if($isLogIn){
		?>
		window.location = "<?=$urls[9]?>";
		
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