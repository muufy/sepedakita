<?php 
include_once "config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['email']))
{
    header('location:login.php');
}
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}

$sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM pesanan WHERE email = '$email' ORDER BY nomor DESC");
$row=mysqli_fetch_array($sql);
$jumlah = mysqli_num_rows($sql);

if (isset($_GET["deleteorder"])) {
    $order_id = $_GET["deleteorder"];
    $hapus = "DELETE FROM pesanan WHERE order_id ='$order_id'";
    $order = mysqli_query($GLOBALS['koneksi'],$hapus);
    $hapus1 = "DELETE FROM brg_pesanan WHERE order_id ='$order_id'";
    $order1 = mysqli_query($GLOBALS['koneksi'],$hapus1);
    header('location:cekorder.php');
}
?>
<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dcf78cbd5c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">


    <title>SEPEDA KITA</title>
  </head>
  <body>
    <!-- START HEADER -->
    <nav class="navbar navbar-light navbar-expand-lg" id="header">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="images/logokt.png" class="img-fluid"></a>
                <ul class="navbar-nav list-group list-group-horizontal">
                  <a href="index.php" class="nav-item nav-link text-info mr-3">HOME</a>
                  <li class="nav-item dropdown">
                  <a class="nav-item nav-link text-info mr-3 dropdown-toggle" href="catalog.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  CATALOG
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="catalog.php">Sepeda</a>
                        <a class="dropdown-item" href="catalogAkse.php">Aksesoris</a>
                    </div>
                  </li>
                  <a href="about.php" class="nav-item nav-link text-info mr-3">ABOUT</a>
                  <a href="cart.php" class="nav-item nav-link mr-3"><img src="images/cart.png"></a> 
                  <?php if(!isset($_SESSION['email']))
                        {?>
                        <a href="login.php" class="nav-item nav-link mr-3"><img src="images/login.png"></a> 
                  <?php }else{ ?>
                        <a href="logout.php" class="nav-item nav-link mr-3"><img src="images/logout.png"></a>
                  <?php }?>
                </ul>
        </div>
    </nav>
    <!-- END HEADER -->

    <div class="col mt-5" id="bg-putih">
    <div class="row justify-content-center mb-5 pt-4">
                    <div class="col-md-10 col-sm-10" id="dashboard">
                        <h2 class="text-center">Riwayat Pesanan</h2>
                        <div class="text-center pb-3"><label>Silahkan Upload Bukti Bayar pada Menu ini</label></div>
                        <?php if(isset($_GET['succeed'])){?>
                                <div class="text-center">
                                    <div class="alert alert-success" style="color:green;">
                                        <b>Bukti Bayar berhasil diupload</b>
                                    </div>
                                </div>
					    <?php }elseif(isset($_GET['failed'])){?>
                                <div class="text-center">
                                    <div class="alert alert-danger" style="color:red;">
                                        <b>Bukti Bayar gagal diupload!<br>Silahkan Cek kembali Ekstensi file anda</b>
                                    </div>
                                </div>
                        <?php }?>
                        <table class="table table-borderless table-hover text-center">
                            <thead style="font-size: 0.8em;">
                                <tr>
                                    <th></th>
                                    <th>Order ID</th>
                                    <th>Tanggal</th>
                                    <th>Kota</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Bukti Bayar</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php if ($jumlah == 0) {?>
                                        <h4></h4>
                                <?php }else do{ ?>
                                    <tr>  
                                        <td class="align-middle">
                                            <a href="detailorder.php?order_id=<?=$row['order_id']?>" class="btn btn-outline-primary btn-sm">Detail Order</a>
                                        </td>
                                        <td class="align-middle"><?php echo $id=$row['order_id'];?></td>
                                        <td class="align-middle"><?php echo $row['date']; ?></td>
                                        <td class="align-middle">
                                            <?php 
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
                                            ?>
                                        </td>
                                        <td class="align-middle"><?php echo $row['address']; ?></td>
                                        <td class="align-middle"><?php echo $row['phone']; ?></td>
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
                                            <?php if ($row['bukti_bayar']==NULL){?>
                                                <label>Belum Upload Bukti Bayar</label>
                                            <?php }else{ ?>
                                            <a class="example-image-link" data-lightbox="example-1" href="buktibayar/<?php echo $row['bukti_bayar'];?>">
                                            <img class="example-image" src="buktibayar/<?php echo $row['bukti_bayar'];?>" style="width: 60px; height: 60px;">
                                            <?php } ?>
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal<?php echo $row['order_id']; ?>" >
                                            Upload Bukti Transfer
                                            </a>
                                        </td>
                                        <!-- MODAL UPLOAD BUKTI BAYAR -->
                                            <div class="modal fade" id="modal<?php echo $row['order_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form method="post" action="tambah.php" enctype="multipart/form-data">
                                                        <div class="form-group">
					                                        <label>Gambar Product :</label>
					                                        <br><input type="file" name="buktibayar"><br>
                                                            <div class="invisible"><input type="text" name="order_id" value="<?php echo $id=$row['order_id'];?>"></div>
				                                        </div>
                                                        <div class="text-right "><label>*Upload dengan extensi jpg atau png!</label></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input required type="submit" class="btn btn-primary pl-2" name="buktibayar" value="Confirm"></input>
                                                    </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <td class="align-middle">
                                            <?php if ($row['status']==0 || $row['status']==3 || $row['status']==4){?>
                                                <a href="cekorder.php?deleteorder=<?= $row['order_id']?>" class="btn btn-sm btn-outline-danger">
                                                    &nbsp;Delete
                                                </a>
                                            <?php }else{?>
                                                <button class="btn btn-sm btn-outline-danger" type="button" disabled>
                                                    &nbsp;Delete
                                                </button>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php }while($row=mysqli_fetch_array($sql)) ?>
                                </tbody>    
                        </table>
                        <div class="text-right">
                            <label style="font-size:small;">*Data dalam fase Dikonfirmasi dan Dikirim tidak dapat dihapus</label><br>
                            <label style="font-size:small;">*Pengiriman akan dilakukan hari selanjutnya, Jika Pembayaran diatas Jam 12</label>
                        </div>
                    </div>
                </div>
    </div>
    
    
   <?php if ($jumlah >= 3){ ?>
    <div class="container-fluid bg-lightgray" id="contacts">
        <?php }else{ ?>
            <div class="container-fluid bg-lightgray fixed-bottom" id="contacts">
            <?php }?>
        <div class="container">
            <div class="row justify-content-center pt-4">
                <!-- START CONTACT -->
                <div class="align-bottom">
                    <h5>FIND US</h5>
                    <p><a href=""><img src="images/icon-ig.png" class="img-fluid pr-3 ">sepedakt</a>
                    <a href=""><img src="images/icon-yt.png" class="img-fluid pr-3 ">Sepeda Kita</a>
                    <a href=""><img src="images/icon-phone.png" class="img-fluid pr-3 ">021-123456</a></p>
                </div>
                <!-- END CONTACT -->
            </div>
        </div>
    </div>

   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/lightbox-plus-jquery.min.js"></script>    
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <!-- <script src="js/jquery-3.5.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    -->
  </body>
</html>