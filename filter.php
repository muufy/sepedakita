<?php 
include_once "config/config.php";
ob_start();
session_start();
ob_end_clean();


?>

<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    
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

    <!-- PRODUCT SHOWCASE -->
        <?php 
            if(isset($_GET['cari'])){
	            $cari = $_GET['cari'];
            }   
            
            if(isset($_GET['filter'])){
                $filter=$_GET['filter'];
                $sql1=mysqli_query($GLOBALS['koneksi'],"SELECT DISTINCT brand FROM mainproduct where jenis='sepeda'");
                $row1=mysqli_fetch_array($sql1); 
            } 

            if(isset($_GET['filterakse'])){
                $filter=$_GET['filterakse'];
                $sql1=mysqli_query($GLOBALS['koneksi'],"SELECT DISTINCT brand FROM mainproduct where jenis='aksesoris'");
                $row1=mysqli_fetch_array($sql1); 
            } 

            $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM mainproduct where brand='$filter' ORDER BY id_barang DESC");
            $row=mysqli_fetch_array($sql); 
            $jumlah = mysqli_num_rows($sql);

            
        ?>
        <h1>KATALOG</h1>

    <div class="p-3">
    <form class="form-inline my-2 my-lg-0" action="search.php?cari=<?=$src['cari']?>">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk" aria-label="Search" name="cari">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>

    <div class="row">
        <div class="col ml-3 pb-3">
            <label class="ml-3 font-weight-bold">Filter Brand :</label>
            <?php do{ ?>
                <a href="filter.php?filter=<?=$row1['brand']?>" class="btn btn-outline-primary ml-3"><?php echo $row1['brand']?></a>
            <?php }while($row1=mysqli_fetch_array($sql1))?>
        </div>
    </div>
    
    <div class="sepeda">
        <div class="text-center font-weight-bold"><h4>Filtering Brand : <?php echo $filter?></h4></div>
    <div id="container"> 
        <div class="row row-cols-md-4">
        <?php do{ ?>
            <div class="col mb-4">
            <div class="card text-center" style="width: 18rem;">
                <a href="detailproduk.php?id_barang=<?=$row['id_barang']?>">
                <img src="adminKT/upload/<?php echo $row['img_barang'];?>" class="card-img-top" alt="..." style="width: 240px; height: 180px;">
                <div class="card-body">
                <div class="invisible"><?php echo $row['id_barang']; ?></div>
                    <h5 class="card-title"><?php echo $row['nama_barang']; ?></h5>
                    <p class="card-text">IDR <?php echo $row['harga_barang'];?></p>
                </div>
                </a>
            </div>
            </div>
        <?php }while($row=mysqli_fetch_array($sql))?>
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

    </body>
</html>