<?php 
include_once "config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['email']))
{
    header('location:login.php');
}
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
} 
$sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM brg_pesanan WHERE order_id = '$order_id'");
$row=mysqli_fetch_array($sql);
$jumlah = mysqli_num_rows($sql);


$total[] = $row['total'];
$ongkir = 0;
switch ($row['kota']){
    case 'jaktim':
        $ongkir = 185000;
        break;
    case 'jakut':
        $ongkir = 220000;
        break;
    case 'jaksel':
        $ongkir = 200000;
        break;
    case 'jakbar':
        $ongkir = 250000;
        break;
    case 'depok':
        $ongkir = 210000;
        break;
    case 'bekasikota':
        $ongkir = 150000;
        break;
    case 'bekasikab':
        $ongkir = 185000;
        break;
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
    <div class="row justify-content-center mb-5 mt-5">
                    <div class="col-md-10 col-sm-10" id="dashboard">
                        <a href="cekorder.php" class="btn btn-outline-primary mt-4">< Back</a>
                        <h2 class="text-center">Detail Order</h2>
                        <div class="row pt-3 pb-3">
                            <div class="col row">
                                <div class="col text-right">
                                    <label>Order ID :</label><br>
                                    <label>Date :</label>
                                </div>
                                <div class="col">
                                    <label><?php echo $row['order_id']?></label><br>
                                    <label><?php echo $row['date']?></label>
                                </div>
                            </div>
                            <div class="col row">
                                <div class="col text-right">
                                    <label>Kota :</label><br>
                                    <label>Alamat :</label>
                                </div>
                                <div class="col">
                                    <label>
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
                                    </label><br>
                                    <label><?php echo $row['address']?></label>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover text-center">
                            <thead style="font-size: 0.8em;">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php do{ ?>
                                    <tr>  
                                        <td class="align-middle"><?php echo $row['nama_barang']; ?></td>
                                        <td class="align-middle">Rp. <?php echo $row['harga_barang']; ?></td>
                                    </tr>
                                    <?php }while($row=mysqli_fetch_array($sql)) ?>
                                    <tr>
                                        <td>Delivery Fee</td>
                                        <td>Rp. <?php echo $ongkir;?></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL</td>
                                        <td>Rp. <?php echo $total[0];?></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
    </div>
    
    
 
        <div class="container-fluid bg-lightgray" id="contacts">
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