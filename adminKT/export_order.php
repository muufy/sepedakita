<?php 
// Mengakses plugin mpdf untuk membuat file pdf
require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

// Menggabung file koneksi database
include '../config/config.php';
$document_name='laporan_order';
ob_start();
?>

<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html, charset=Windows-1252">
    <style type="text/css">
    	*{
    		padding: 0;
    		margin: 0;
    	}
    	div{
    		width: 100%;
    		margin: auto;
    		text-align: center;
    	}
		table,td,th {
			font-size: 17px;
			margin: auto;
			border-collapse: collapse;
			border: 1px solid black;
			padding: 20px;	
		}
		thead {
			font-weight: bold;
			color: black;
		}
		td {
			padding: 10px;
			text-align: center;
		}
	</style>
    </style>
</head>
	<body>
		<?php       
            // MYSQL QUERY
            $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM pesanan order by nomor desc");
            $row=mysqli_fetch_array($sql);
			$jumlah = mysqli_num_rows($sql);
        ?>
		<div>
			<h2>Laporan Pesanan</h2>
			<table>
			  	<thead>
				    <tr>
					   <th>No. Order</th>
					   <th>Date</th>
					   <th>Email</th>
	                   <th>Kota</th>
					   <th>Alamat</th>
	                   <th>Phone</th>
					   <th>Harga Total</th>
	                   <th>Status</th>
					</tr>
			   	</thead>
					<tbody>
					<?php if ($jumlah == 0) {?>
                            <h4></h4>
                        <?php }else do{ ?>
						<tr>
							<td><?php echo $row['order_id'];?></td>
							<td><?php echo $row['date'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['kota'];?></td>
							<td><?php echo $row['address'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td><?php echo $row['total'];?></td>
							<td><?php echo $row['status']== 3 ? "Selesai" : "Not Finish" ?></td>
						</tr>
					<?php }while($row=mysqli_fetch_array($sql)) ?>
					</tbody>
			</table>
		</div>
	</body>
</html>
<?php 
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$document_name.".pdf" ,'D');
$koneksi->close();
?>