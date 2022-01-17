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
if (isset($_GET["deletecart"])) {
    $cart_id= $_GET["deletecart"];
    $sql = "DELETE FROM pesan WHERE cart_id ='$cart_id'";
    $query = mysqli_query($GLOBALS['koneksi'],$sql);
    header('location:cart.php');
}

            $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM pesan WHERE email ='$email'");
            $row=mysqli_fetch_array($sql);
            $jumlah = mysqli_num_rows($sql);

            $sql1=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM member WHERE email='$email'");
            $mail=mysqli_fetch_array($sql1);

            $ord=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM pesan WHERE email ='$email'");
            $shw=mysqli_fetch_array($ord);

            $sql1=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM pesan WHERE email ='$email'");
            $row1=mysqli_fetch_array($sql1);
            $n = mysqli_num_rows($sql1);

            $grand = 0;
            $ongkir = 0;
        switch ($mail['kota']){
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
    function randomString($length)
    {
        $str = "";
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }   
    $ranum = randomString(5);    
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
    <div  id="bg-putih">
    <div class="col mt-5">
        <div class="row justify-content-center mb-5 pt-4">
                <div class="col-md-10 col-sm-10" id="dashboard">
                        <h2 class="text-center pb-3">Your Cart</h2>
                        <div class="text-center pb-3"><a href="cekorder.php">Cek History Pembelian</a></div>
                        <table class="table table-striped table-hover text-center">
                            <thead style="font-size: 0.8em;">
                                 <?php if ($jumlah != 0) {?>
                                    <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th></th>
                                </tr>
                                <?php }?>
                            </thead>
                                <tbody>
                                <?php if ($jumlah == 0) {?>
                                        <h4 class="text-center">Keranjang Masih Kosong<br>Silahkan Lihat Produk pada Catalog</h4>
                                <?php }else do{ ?>
                                    <tr>  
                                        <td class="align-middle"><?php echo $row['nama_barang']; ?></td>
                                        <td class="align-middle">Rp. <?php echo $row['harga_barang']; ?></td> 
                                        <td class="align-middle">
                                            <a href="cart.php?deletecart=<?= $row['cart_id']?>" class="btn btn-sm btn-danger">
                                                &nbsp;Delete
                                            </a>
                                        </td>
                                        <td class="invisible"><?php echo $row['cart_id']; ?></td> 
                                    </tr>
                                    <?php }while($row=mysqli_fetch_array($sql)) ?>
                                </tbody>
                        </table>
                        
                        <!-- Button trigger modal -->
                        <?php if ($jumlah != 0) {?>
                        <div class="text-center m-4">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Order
                        </button></div>
                        <?php }?>

                        <div class="">
                                        <form method="post" action="tambah.php" enctype="multipart/form-data" >
                                            <input type="hidden" name="order_ids[]" value="<?php echo $ranum;?>">
                                            <input type="hidden" name="email[]" value="<?php echo $mail['email'] ?>">
                                            <input type="hidden" name="phone[]" value="<?php echo $mail['phone'] ?>">
                                            <input type="hidden" name="kota[]" value="<?php echo $mail['kota'] ?>">
                                            <input type="hidden" name="address[]" value="<?php echo $mail['alamat'] ?>">
                                                <?php do{ ?>
                                                    <input type="hidden" name="order_id[]" value="<?php echo $ranum;?>">
                                                    <input type="hidden" name="emails[]" value="<?php echo $mail['email'] ?>">
                                                    <input type="hidden" name="phones[]" value="<?php echo $mail['phone'] ?>">
                                                    <input type="hidden" name="kotas[]" value="<?php echo $mail['kota'] ?>">
                                                    <input type="hidden" name="addresss[]" value="<?php echo $mail['alamat'] ?>">
                                                    <input type="hidden" name="nama_barang[]" value="<?php echo $shw['nama_barang'] ?>">
                                                    <input type="hidden" name="harga_barang[]" value="<?php echo $shw['harga_barang'] ?>">
                                                    <div class="invisible"><?php $grand= $grand+$shw['harga_barang']; $z=1; $z++?></div>
                                                <?php }while($shw=mysqli_fetch_array($ord)) ?>
                                                <?php $total= $grand+$ongkir;?>
                                                <?php 
                                                for($y=0; $y<=$z; $y++){ ?>
                                                <input type="hidden" name="totals[]" value="<?php echo $total?>">
                                                <?php }?>
                                                
                                                <input type="hidden" name="total[]" value="<?php echo $total; ?>">
                        </div>

                        <!-- Modal Konfirmasi -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <div class="row">   
                                        <div class="col text-right">
                                            <label>Order ID </label>
                                        </div>
                                        <div class="col">
                                            <label><?php echo $ranum ?></label>
                                        </div>
                                    </div> 
                                    <div class="row">   
                                        <div class="col text-right">
                                            <label>Kota Tujuan </label>
                                        </div>
                                        <div class="col">
                                            <label>
                                            <?php 
                                                if ($mail['kota']=='jaktim'){ 
                                                    echo 'Jakarta Timur';
                                                }elseif ($mail['kota']=='jakut'){
                                                    echo 'Jakarta Utara';
                                                }elseif ($mail['kota']=='jaksel'){
                                                    echo 'Jakarta Selatan';
                                                }elseif ($mail['kota']=='jakbar'){
                                                    echo 'Jakarta Barat';
                                                }elseif ($mail['kota']=='depok'){
                                                    echo 'Depok';
                                                }elseif ($mail['kota']=='bekasikota'){
                                                    echo 'Kota Bekasi';
                                                }elseif ($mail['kota']=='bekasikab'){
                                                    echo 'Kabupaten Bekasi';
                                                }
                                            ?>
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="row">  
                                        <div class="col text-right">
                                            <label>Alamat Tujuan </label>
                                        </div>
                                        <div class="col">
                                           <label><?php echo $mail['alamat'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">  
                                        <div class="col text-right">
                                            <label>Total Harga Barang</label>
                                        </div>
                                        <div class="col">
                                            <label>Rp.<?php echo $grand; ?></label>
                                        </div>
                                    </div>
                                    <div class="row">  
                                        <div class="col text-right">
                                            <label>Jasa Delivery</label>
                                        </div>
                                        <div class="col">
                                            <label>Rp.<?php echo $ongkir; ?></label>
                                        </div>
                                    </div>
                                    <div class="row">  
                                        <div class="col text-right">
                                            <label>Grand Total</label>
                                        </div>
                                        <div class="col">
                                            <label>Rp.<?php echo $total; ?></label>
                                        </div>
                                    </div>
                                        <div class="text-center">
                                            <label class="mt-5 font-weight-bold">!HARAP DIPERHATIKAN!</label><br>
                                            <label>Pastikan Data Diatas Benar!!!</label><br>
                                            <label>Silahkan Transfer Sesuai Grand Total<br>Ke Rekening 12345678 a/n Admin</label>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center mt-3"><input required type="submit" class="btn btn-outline-primary btn-block pl-2" name="addorder" value="Konfirmasi Pesanan"></input></div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>            
            </div>
            </div>            
        </div>
    </div>
   
    <?php if ($jumlah<=2){?>
    <div class="container-fluid bg-lightgray fixed-bottom" id="contacts">
    <?php }else{?>
        <div class="container-fluid bg-lightgray" id="contacts">
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
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <!-- <script src="js/jquery-3.5.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    -->
  </body>
</html>