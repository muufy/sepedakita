<?php 
include_once "../config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['username']))
{
    header('location:loginadmin.php');
}


if(isset($_GET["getdata"])) {
	if($_GET["getdata"] == "fetch") {
		$sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM mainproduct");

		$json_data = [];
		while($row = mysqli_fetch_array($sql)) {
			$json_data[] = [
				"id_barang" => $row['id_barang'],
				"nama_barang" => $row["nama_barang"],
				"harga_barang" => $row["harga_barang"],
				"img_barang" => $row["img_barang"]
			];
		}

		echo json_encode($json_data);

	}
}

?>