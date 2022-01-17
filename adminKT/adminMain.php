<?php 
include_once "../config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['username']))
{
    header('location:loginadmin.php');
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



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    
    <!-- LIGHTBOX JQUERY -->
    <script src="../js/lightbox-plus-jquery.min.js"></script>    
    </body>
</html>