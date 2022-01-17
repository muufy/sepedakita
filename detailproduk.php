<?php
ob_start();
session_start();
ob_end_clean();
    if(isset($_GET['id_barang'])){
        $id_barang=$_GET['id_barang'];
    }   
    include "config/config.php";
    $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM mainproduct WHERE id_barang='$id_barang'");
    $row=mysqli_fetch_array($sql);   
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
    <?php
        if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            $sql1=mysqli_query($GLOBALS['koneksi'],"SELECT email FROM member WHERE email='$email'");
            $mail=mysqli_fetch_array($sql1);
        }
        
    ?>

    <div id="bg-putih">
    <div class="container mt-3">
        <div class="row">
            <div class="col-4 pt-5">
            <a class="example-image-link" data-lightbox="example-1" href="adminKT/upload/<?php echo $row['img_barang'];?>">
                <img class="example-image" src="adminKT/upload/<?php echo $row['img_barang'];?>" class="" alt="..." style="width: 240px; height: 180px">
            </a>
            </div>
            <div class="col-8 pt-5">
                <div id="judul"><label><?php echo $row['nama_barang']?></label></div>
                <label>IDR. <?php echo $row['harga_barang']?></label><br>
                <label>Stock : <?php echo $row['stock']?></label><br>
                <label>Type : <?php echo $row['tipe_barang']?></label>
                <p><?php echo $row['deskripsi_barang']?></p>               
                <div class="invisible"><?php echo $row['id_barang']; ?></div>
            </div>

            <div class="col-4">
            <div class="pl-5"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
               Klik Untuk Melihat<br>Spesifikasi Produk
            </button></div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Spesifikasi Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi1']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi1']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi2']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi2']?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi3']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi3']?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi4']?>
                            </div>
                            <div class="col-8">
                            <?php echo $row['opsi4']?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi5']?>
                            </div>
                            <div class="col-8">
                            <?php echo $row['opsi5']?><br>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi6']?>
                            </div>
                            <div class="col-8">
                            <?php echo $row['opsi6']?><br>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-3">
                                <?php echo $row['title_opsi7']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi7']?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi8']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi8']?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi9']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi9']?><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <?php echo $row['title_opsi10']?>
                            </div>
                            <div class="col-8">
                                <?php echo $row['opsi10']?><br>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>

                    
            <div class="col-8 pt-3">
            <form method="post" action="tambah.php" enctype="multipart/form-data" >
            <a href="catalog.php" class="btn btn-outline-dark" role="button" aria-pressed="true">< Back</a>
                <?php 
                if(!isset($_SESSION['email'])){?>
                    <a href="login.php" class="btn btn-outline-primary">Login untuk menambahkan</a>
                <?php } else{?>
                    <input required type="submit" class="btn btn-outline-primary pl-2" name="addcart" value="Add to Cart"></input>
                <?php }?>
                <div class="invisible">
                    <input type="text" name="email" value="<?php echo $mail['email']; ?>">
                    <input type="text" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                    <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>">
                    <input type="text" name="harga_barang" value="<?php echo $row['harga_barang']; ?>">
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
    

    <div class="container-fluid bg-lightgray fixed-bottom" id="contacts">
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
