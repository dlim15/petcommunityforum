<?php
include("menu.php");
?>
<img class="boardImage" src="img/main_petCare.png" alt="main_petCare.png" />
<div id="post" class="postCareCared">
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
	searching("cared", 3, "", $("#idVal").val());
	$("#searchButton").click(function(){
		if($("#search").val() == "" && $("#searchFor").val()!=1){
			alert("Search cannot be empty.");
		}else{
			searching("cared", $("#searchFor").val(), ($("#searchFor").val() == 1 ? $("#breed").val() : $("#search").val()), $("#idVal").val());
		}
	});
	$(".newPost").click(function(){
		<?php
		if($isLogIn){
		?>
		window.location = "<?=$urls[12]?>";
		
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