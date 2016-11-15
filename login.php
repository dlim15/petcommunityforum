<?php
session_start();
include("sqlRelated.php");
$postType;
if(!empty($_POST["postType"])){
	$postType = $_POST["postType"];
}
if(isset($_POST["login"]) && !(empty($_POST["id"]) || empty($_POST["pw"]))){
	$id = $_POST["id"];
	$pw = $_POST["pw"];
	$sql = "SELECT Password FROM users WHERE User_id='".$id."';";
	$result = getFromDb($sql);
	
	if(empty($result)|| $pw != $result[0]['Password']){
		echo '<script language="javascript">';
		echo 'alert(\'Invalid Id or Password.\')';
		echo '</script>';
	}
	else{
		$_SESSION['status'] ='Active';
		header('location:home.php?id='.$id);
		exit;
	}
}
?>
<!DOCTYPE html>
	<head>
		<title> DV's Pet Community Forum </title>
		<meta charset="utf-8"/>
		<link href="img/dogIcon.png" type="image/png" rel="shortcut icon" />
		<link href="design.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	</head>
	<body>
		<div id="loginField">
			Please Enter your Id and Password
			<br>
			<form method="post">
				<input type="text" name="id" placeholder="User Id" required /> <br>
				<input type="password" name="pw" placeholder="Password" required /><br>
				<input type="submit" name="login" value="Login" />
			</form>
		</div>
	</div>	
</body>
</html>