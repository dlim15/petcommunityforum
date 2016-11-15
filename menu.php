<?php
include("upper.php");
include("db_info.php");
ob_start();
$id="";
$urls = array("home.php", "adoptionFromShelter.php","adoptionFromUser.php","lostPets.php","foundPets.php",
				"petCare.php","petCared.php","petTube.php","adoptionPost.php","lostPost.php","foundPost.php", "carePost.php","caredPost.php", "tubePost.php");
$isLogIn=false;
?>
	<script type="text/javascript" src="overallFunction.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		openSideBar();
		closeSideBar();
		directsToEncyclopedia();
		numberOnly();
		moneyCheck();
	<?php
	if($_SESSION['status']=="Active"){
		$id=$_REQUEST["id"];
		$isLogIn = true;
		for($i=0; $i<14; $i++){
			$urls[$i] .= "?id=".$id;
		}
		?>
		$(".loggedout").hide();
		$(".loggedin").show();
		function openNewWindow(){
		var left =($(window).width()/2)-300,
			top = ($(window).height()/2)-300;
		window.open("messageBox.php?id=<?=$id?>", "Message", "width=500,height=500,top="+top+", left="+left);
		
		}
		$('#message').click(function(){
			openNewWindow();
		});
		<?php
	}
	else{
		$isLogIn = false;
		?>
		$(".loggedout").show();
		$(".loggedin").hide();
		<?php
	}
	?>
	
	
	});
	</script>
	<div id="sidebar">
		<div id="encyclopedia" class="out">
			<h2>Dog Encyclopedia</h2>
			<select id="ency">
				<?php
					$sql= "SELECT name FROM pet_breed;";
					$query = $db->prepare($sql);
					$query->execute();
					$rows = $query->fetchAll();
					foreach($rows as $row){
						$name = $row["name"];
				?>
				<option value="<?=$name?>"> <?=$name?> </option>
				<?php
				}
				?>
			</select>
			<button id="breedSearch"> Search </button>
		</div>
		<a><img src="img/ssidebar2.png" id="opened" alt="ssidebar2.png" class="out"/></a>
		<a><img src="img/ssidebar.png" id="closed" alt="ssidebar.png" /></a>
		
	</div>
	<div class="info">
	<div id="logPos">
			<a href="login.php" id="login" class="loggedout"> Login </a> 
			<a href="signUp.php" id="signup" class="loggedout"> Sign Up </a> 
			<a href="#" id="message" class="loggedin"> Message </a> 
			<a href="logout.php?id=<?=$id?>" id="logout" class="loggedin"> Logout </a> 
	</div>
	</div>
	<img id="logoMark" src="img/logo.png" alt="logo.png" />
	
	<div id="nav">
	
		<ul>
			<li>
				<a href="<?=$urls[0]?>" >HOME </a>
			</li>
			<li>
				<a href="#">ADOPTION </a>
				<ul> 
					<li>
						<a href="<?=$urls[1]?>">From Shelter </a>
					</li>
					<li>
						<a href="<?=$urls[2]?>">From Other Owners </a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" >LOST/FOUND </a>
				<ul> 
					<li>
						<a href="<?=$urls[3]?>" >Lost</a>
					</li>
					<li>
						<a href="<?=$urls[4]?>" >Found </a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" >PET CARE </a>
				<ul> 
					<li>
						<a href="<?=$urls[5]?>" >Want to care </a>
					</li>
					<li>
						<a href="<?=$urls[6]?>" >Want to be cared </a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?=$urls[7]?>" >PETUBE </a>
			</li>
		</ul>
	</div>
	<div id="section">