<?php 
ob_start();
session_start();
ob_end_clean();

include_once "config/config.php";

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = mysqli_query($GLOBALS['koneksi'],"SELECT * FROM member WHERE email='$email' AND password='$password'");

$row = mysqli_fetch_array($sql);
$numrows = mysqli_num_rows($sql);

if (empty($row)) 
{
	header('Location:login.php?loginerror');
}
else
{
	$_SESSION['email']=$row['email'];
	header('Location:index.php');
}
?>