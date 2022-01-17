<?php 
include_once "../config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['username']))
{
    header('location:loginadmin.php');
}
    $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM pesanan ORDER BY nomor DESC");
    $row=mysqli_fetch_array($sql);
    $jumlah = mysqli_num_rows($sql);

  

if(isset($_GET["konfirmasi"])) {
    $id_order= $_GET["konfirmasi"];
    $con1 = "UPDATE pesanan set status=1 where order_id = '$id_order'";
    $firm1 = mysqli_query($GLOBALS['koneksi'],$con1);

    $con2 = "UPDATE brg_pesanan set status=1 where order_id = '$id_order'";
    $firm2 = mysqli_query($GLOBALS['koneksi'],$con2);
    header('location:pemesanan.php');
}elseif(isset($_GET["kirim"])) {
    $id_order= $_GET["kirim"];
    $kirim1 = "UPDATE pesanan set status=2 where order_id = '$id_order'";
    $kirim2 = mysqli_query($GLOBALS['koneksi'],$kirim1);

    $kirim3 = "UPDATE brg_pesanan set status=2 where order_id = '$id_order'";
    $kirim4 = mysqli_query($GLOBALS['koneksi'],$kirim3);
    header('location:pemesanan.php');
}elseif(isset($_GET["selesai"])) {
    $id_order= $_GET["selesai"];
    $selesai1 = "UPDATE pesanan set status=3 where order_id = '$id_order'";
    $selesai2 = mysqli_query($GLOBALS['koneksi'],$selesai1);

    $selesai3 = "UPDATE brg_pesanan set status=3 where order_id = '$id_order'";
    $selesai4 = mysqli_query($GLOBALS['koneksi'],$selesai3);
    header('location:pemesanan.php');
}elseif(isset($_GET["cancel"])) {
    $id_order= $_GET["cancel"];
    $cancel1 = "UPDATE pesanan set status=4 where order_id = '$id_order'";
    $batal1 = mysqli_query($GLOBALS['koneksi'],$cancel1);

    $cancel2 = "UPDATE brg_pesanan set status=4 where order_id = '$id_order'";
    $batal2 = mysqli_query($GLOBALS['koneksi'],$cancel2);
    header('location:pemesanan.php');
}
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

    <div class="col">
    <div class="row justify-content-center mb-5 mt-5">
                    <div class="col-md-10 col-sm-10" id="dashboard">
                        <h2 class="text-center">Data Pesanan</h2>
                        <div class="text-center pb-3"><a href="export_order.php">Cetak Data</a></div>
                        <table class="table table-striped table-hover text-center">
                            <thead style="font-size: 0.8em;">
                                <tr>
                                    <th>ID Order</th>
                                    <th>Email</th>
                                    <th>Detail Order</th>
                                    <th>Bukti Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php if ($jumlah == 0) {?>
                                        <h4></h4>
                                <?php }else do{ ?>
                                    <tr>  
                                        <td class="align-middle"><?php echo $row['order_id']; ?></td>
                                        <td class="align-middle"><?php echo $row['email']; ?></td>
                                        
                                        <td class="align-middle">
                                            <a href="detailpesan.php?order_id=<?=$row['order_id']?>">
                                            Detail Pesanan
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <?php if ($row['bukti_bayar']==NULL){?>
                                                <label>Belum Upload Bukti Bayar</label>
                                            <?php }else{ ?>
                                            <a class="example-image-link" data-lightbox="example-1" href="../buktibayar/<?php echo $row['bukti_bayar'];?>">
                                            <img class="example-image" src="../buktibayar/<?php echo $row['bukti_bayar'];?>" style="width: 60px; height: 60px;">
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php switch ($row['status']){
                                                case 0:
                                                    echo "Belum Konfirmasi";
                                                    break;
                                                case 1:
                                                    echo "Dikonfirmasi";
                                                    break;
                                                case 2:
                                                    echo "Dikirim";
                                                    break;
                                                case 3:
                                                    echo "Selesai";
                                                    break;
                                                case 4:
                                                    echo "Pesanan dibatalkan";
                                                    break;
                                                }?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="pemesanan.php?konfirmasi=<?=$row['order_id'] ?>" class="btn btn-sm btn-block btn-primary">
                                                &nbsp;Confirm
                                            </a>
                                            <a href="pemesanan.php?kirim=<?=$row['order_id'] ?>" class="btn btn-sm btn-block btn-secondary">
                                                &nbsp;Send
                                            </a>
                                            <a href="pemesanan.php?selesai=<?=$row['order_id'] ?>" class="btn btn-sm btn-block btn-success">
                                                &nbsp;Done
                                            </a>
                                            <a href="pemesanan.php?cancel=<?=$row['order_id'] ?>" class="btn btn-sm btn-block btn-danger">
                                                &nbsp;Cancel
                                            </a>
                                        </td>
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