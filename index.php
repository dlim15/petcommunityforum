<?php
session_start();
$_SESSION['status'] = "";
header('Refresh: 2; URL = home.php');
?>