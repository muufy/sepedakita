<?php 
ob_start();
session_start();
ob_end_clean();

include_once "../config/config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

// MYSQL QUERY
$sql = mysqli_query($GLOBALS['koneksi'],"SELECT * FROM admin WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($sql);
$numrows = mysqli_num_rows($sql);

	if (empty($row)) 
	{
		header('Location:loginadmin.php?loginerror');
	}
	else
	{
		$_SESSION['username']=$row['username'];
		header('Location:adminMain.php');
	}
?>