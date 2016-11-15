<?php
session_start();
$id=$_REQUEST['id'];
session_destroy();
$_SESSION = array();
header('Refresh:2; URL="home.php");');
echo "<h1>See you later," .$id. "!</h1>";
for($i = 1; $i < 5; $i++)
	echo "<img src=\"img/bye".$i.".jpg\" alt=\"bye1\" />";

?>