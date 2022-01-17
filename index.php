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

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dcf78cbd5c.js" crossorigin="anonymous"></script>

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="11f3e78f-1a70-49a8-af6f-ede3c0dea8c7";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

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

    <!-- START BANNER -->
    
    <div class="container-fluid">
        <div id="banner">
        <img src="images/banner.png" class="mw-100" alt="...">
        <h3><br>Memudahkan Keperluan Bersepeda Anda</h3>
        </div>
    </div>
    <!-- END BANNER -->
   
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
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <!-- <script src="js/jquery-3.5.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    -->
  </body>
</html>