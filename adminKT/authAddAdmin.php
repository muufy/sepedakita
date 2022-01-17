<?php
include_once "../config/config.php";
		if (isset($_POST['addadmin']))
	{
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$password = md5($_POST['password']);

		$query = "insert into admin (username,fullname,password) values ('$fullname','$username','$password')";

		$result= mysqli_query($GLOBALS['koneksi'],$query);
		if ($result==1) {
			header("Location: tambahadmin.php?succeed");
		}

	}

?>