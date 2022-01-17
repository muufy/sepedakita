<?php
include_once "../config/config.php";
	if (isset($_POST['register']))
	{
		$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
		$password = md5($_POST['password']);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$phone = $_POST['phone'];
		$kota = $_POST['kota'];
        $alamat = $_POST['alamat'];
		
		$cek_login = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM member WHERE email = '$email'"));
		
		if ( $cek_login > 0 ){
			header("Location: ../register.php?double");
		} else{
			$query = "insert into member (fullname,password,email,phone,kota,alamat) values ('$fullname','$password','$email','$phone','$kota','$alamat')";
			$result = mysqli_query($GLOBALS['koneksi'], $query);
			if ($result==1) {
				header("Location: ../login.php");
				echo $take;
			}
		}
	}
?>