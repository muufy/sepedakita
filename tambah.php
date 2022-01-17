<?php
include_once "config/config.php";
		if (isset($_POST['addcart']))
	{
        $email = $_POST['email'];
		$id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga_barang = $_POST['harga_barang'];

		$query = "insert into pesan (email,id_barang,nama_barang,harga_barang) values ('$email','$id_barang','$nama_barang','$harga_barang')";

		$result= mysqli_query($GLOBALS['koneksi'],$query);
		if ($result==1) {
			header("Location: catalog.php");
		}
	}

	if (isset($_POST['addorder']))
	{
		$order_id = $_POST['order_id'];
		$order_ids = $_POST['order_ids'];
        $email = $_POST['email'];
		$phone = $_POST['phone'];
		$kota = $_POST['kota'];
		$address = $_POST['address'];
		$total = $_POST['total'];

		$emails = $_POST['emails'];
		$phones = $_POST['phones'];
		$kotas = $_POST['kotas'];
		$addresss = $_POST['addresss'];
        $nama_barang = $_POST['nama_barang'];
        $harga_barang = $_POST['harga_barang'];
		$totals = $_POST['totals'];
		
		$repeat = count ($order_id);
		$ulang = count ($order_ids);

		for($x=0; $x<$ulang; $x++){
		$query2 = "insert into pesanan (order_id,email,kota,address,phone,total) values ('$order_ids[$x]','$email[$x]','$kota[$x]','$address[$x]','$phone[$x]','$total[$x]')";
		$result2 = mysqli_query($GLOBALS['koneksi'],$query2);
		}

		for($x=0; $x<$repeat; $x++){
			$query1 = "insert into brg_pesanan (order_id,email,kota,address,phone,total,nama_barang,harga_barang) values ('$order_id[$x]','$emails[$x]','$kotas[$x]','$addresss[$x]','$phones[$x]','$totals[$x]','$nama_barang[$x]','$harga_barang[$x]')";
			$result1= mysqli_query($GLOBALS['koneksi'],$query1);
			mysqli_query($GLOBALS['koneksi'],"DELETE FROM pesan WHERE nama_barang='$nama_barang[$x]'");
		}

		for($x=0; $x<$repeat; $x++){
			mysqli_query($GLOBALS['koneksi'],"UPDATE mainproduct SET stock=stock-1 WHERE nama_barang='$nama_barang[$x]'");
		}

		if ($result1==1) {
			header("Location: cekorder.php");
		}		
	}

	if (isset($_POST['buktibayar']))
	{
		$order_id = $_POST['order_id'];
		$bukti_bayar = $_FILES['buktibayar']['name'];
		
		$extensionList = array("jpge", "jpg", "png");	
		$pecah = explode(".", $bukti_bayar);
		$ekstensi = $pecah[1];	
		$namaDir = 'buktibayar/';
		$pathFile = $namaDir . $bukti_bayar;

		if (in_array($ekstensi, $extensionList))
			{
				// memindahkan file ke temporary
				$image_tmp= $_FILES['buktibayar']['tmp_name'];
			
				// proses upload file dari temporary ke path file
				if (move_uploaded_file($_FILES['buktibayar']['tmp_name'], $pathFile)) 
				{
					$query = "update pesanan set bukti_bayar = '$bukti_bayar' where order_id = '$order_id'";
					$result= mysqli_query($GLOBALS['koneksi'],$query);
						if ($result==1) {
							header("Location: cekorder.php?succeed");
						}
				} 
				else
				{
					header("Location: cekorder.php?failed");
				}
			}
			else header("Location: cekorder.php?failed");
				
	}
?>