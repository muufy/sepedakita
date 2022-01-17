<?php 
include_once "../config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['username']))
{
    header('location:loginadmin.php');
}
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
} 
    $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM brg_pesanan where order_id = '$order_id' ORDER BY nomor DESC");
    $row=mysqli_fetch_array($sql);
    $jumlah = mysqli_num_rows($sql);

?>

<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dcf78cbd5c.js" crossorigin="anonymous"></script>

    <!-- LIGHTBOX JQUERY -->
    <link rel="stylesheet" type="text/css" href="../css/lightbox.min.css">

    <title>SEPEDA KITA</title>
  </head>
  <body id="body">

    <!-- Start Sidebar -->
    <div class="row mr-0" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <a href="adminMain.php"><img src="../images/logokt.png" id="logo"></a>
                </li>

                <a href="pemesanan.php" class="list-group-item list-group-item-action flex-column align-items-start" id="option">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="menu-collapsed">Pesanan</span>
                    </div>
                </a>

                <a href="produk.php" class="list-group-item list-group-item-action flex-column align-items-start" id="option">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="menu-collapsed">Produk</span>
                    </div>
                </a>

                <a href="tambahadmin.php" class=" list-group-item list-group-item-action flex-column align-items-start" id="option">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="menu-collapsed">Tambah Admin</span>
                    </div>
                </a>

                <a href="logout.php" class="list-group-item list-group-item-action flex-column align-items-start" id="option">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="menu-collapsed">Logout</span>
                    </div>
                </a>
            </ul>
        </div> 
     
	<!-- END SIDEBAR -->

    <div class="col mt-5">
    <div class="row justify-content-center mb-5 mt-5">
                    <div class="col-md-10 col-sm-10" id="dashboard">
                        <div class="text-left pb-3"><a href="pemesanan.php" class="btn btn-outline-dark">Back</a></div>
                        <h2 class="text-center">Detail Pesanan</h2>
                            <div class="row pb-3">
                                <div class="col-2">
                                    <label>Email</label><br>
                                    <label>Kota</label><br>
                                    <label>Alamat</label><br>
                                    <label>Phone</label><br>
                                    <label>Total</label>
                                </div>
                                <div class="col-8">
                                    <label> : <?php echo $row['email']; ?></label><br>
                                    <label> : <?php 
                                        if ($row['kota']=='jaktim'){ 
                                            echo 'Jakarta Timur';
                                        }elseif ($row['kota']=='jakut'){
                                            echo 'Jakarta Utara';
                                        }elseif ($row['kota']=='jaksel'){
                                            echo 'Jakarta Selatan';
                                        }elseif ($row['kota']=='jakbar'){
                                            echo 'Jakarta Barat';
                                        }elseif ($row['kota']=='depok'){
                                            echo 'Depok';
                                        }elseif ($row['kota']=='bekasikota'){
                                            echo 'Kota Bekasi';
                                        }elseif ($row['kota']=='bekasikab'){
                                            echo 'Kabupaten Bekasi';
                                        }
                                    ?></label><br>
                                    <label> : <?php echo $row['address']?></label><br>
                                    <label> : <?php echo $row['phone']?></label><br>
                                    <label> : <?php echo $row['total']?></label><br>
                                </div>
                            </div>
                        <table class="table table-borderless table-hover text-center">
                            <thead style="font-size: 0.8em;">
                                <tr>
                                    <th>ID Order</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php do{ ?>
                                    <tr>  
                                        <td class="align-middle"><?php echo $row['order_id']; ?></td>
                                        <td class="align-middle"><?php echo $row['nama_barang']; ?></td>
                                        <td class="align-middle"><?php echo $row['harga_barang']; ?></td>
                                    </tr>
                                    <?php }while($row=mysqli_fetch_array($sql)) ?>
                                </tbody>
                        </table>
                    </div>
                </div>
                </div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <!-- LIGHTBOX JQUERY -->
    <script src="../js/lightbox-plus-jquery.min.js"></script>    
    </body>
</html>