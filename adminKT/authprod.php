<?php
include_once "../config/config.php";
		if (isset($_POST['addproduct']))
	{
		$jenis = $_POST['jenis'];
		$namabarang = $_POST['namaproduct'];
		$tipebarang = $_POST['tipeproduct'];
		$brand = $_POST['brand'];
		$hargabarang = $_POST['hargaproduct'];
		$stock = $_POST['stock'];
		$deskripsibarang = $_POST['deskripsiproduct'];
		$imgbarang = $_FILES['imgbarang']['name'];
		$image_tmp= $_FILES['imgbarang']['tmp_name'];
		$title_opsi1 = $_POST['title_opsi1'];
		$title_opsi2 = $_POST['title_opsi2'];
		$title_opsi3 = $_POST['title_opsi3'];
		$title_opsi4 = $_POST['title_opsi4'];
		$title_opsi5 = $_POST['title_opsi5'];
		$title_opsi6 = $_POST['title_opsi6'];
		$title_opsi7 = $_POST['title_opsi7'];
		$title_opsi8 = $_POST['title_opsi8'];
		$title_opsi9 = $_POST['title_opsi9'];
		$title_opsi10 = $_POST['title_opsi10'];
		$opsi1 = $_POST['opsi1'];
		$opsi2 = $_POST['opsi2'];
		$opsi3 = $_POST['opsi3'];
		$opsi4 = $_POST['opsi4'];
		$opsi5 = $_POST['opsi5'];
		$opsi6 = $_POST['opsi6'];
		$opsi7 = $_POST['opsi7'];
		$opsi8 = $_POST['opsi8'];
		$opsi9 = $_POST['opsi9'];
		$opsi10 = $_POST['opsi10'];
				
		move_uploaded_file($image_tmp, "upload/$imgbarang");

		
		$query = "insert into mainproduct (nama_barang,tipe_barang,brand,harga_barang,stock,deskripsi_barang,img_barang,jenis,title_opsi1,title_opsi2,title_opsi3,title_opsi4,title_opsi5,title_opsi6,title_opsi7,title_opsi8,title_opsi9,title_opsi10,opsi1,opsi2,opsi3,opsi4,opsi5,opsi6,opsi7,opsi8,opsi9,opsi10) values ('$namabarang','$tipebarang','$brand','$hargabarang','$stock','$deskripsibarang','$imgbarang','$jenis','$title_opsi1','$title_opsi2','$title_opsi3','$title_opsi4','$title_opsi5','$title_opsi6','$title_opsi7','$title_opsi8','$title_opsi9','$title_opsi10','$opsi1','$opsi2','$opsi3','$opsi4','$opsi5','$opsi6','$opsi7','$opsi8','$opsi9','$opsi10')";
		$result= mysqli_query($GLOBALS['koneksi'],$query);
		if ($result==1) {
			header("Location: kelolaproduk.php?succeed");
		}
		
	}

?>