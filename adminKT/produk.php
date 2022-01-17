<?php 
include_once "../config/config.php";
ob_start();
session_start();
ob_end_clean();
if(!isset($_SESSION['username']))
{
    header('location:loginadmin.php');
}


if (isset($_GET["deleteId"])) {
    $id_barang= $_GET["deleteId"];
    $sql = "DELETE FROM mainproduct WHERE id_barang ='$id_barang'";
    $query = mysqli_query($GLOBALS['koneksi'],$sql);
    header('location:produk.php');
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


        <div class="col mt-5">
        <?php 
        // MYSQL QUERY
            $sql=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM mainproduct  ORDER BY id_barang DESC");
            $row=mysqli_fetch_array($sql);
        ?>
        <?php 
        // MYSQL QUERY
            $sql1=mysqli_query($GLOBALS['koneksi'],"SELECT * FROM admin");
            $row1=mysqli_fetch_array($sql1);
        ?>

        <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-10 col-sm-10" id="dashboard">
                        <a href="kelolaproduk.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Tambah Produk</a>
                        <h2 class="text-center">List Produk</h2>
                        <table class="table table-striped table-hover text-center">
                            <thead style="font-size: 0.8em;">
                                <tr>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">Harga Produk</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php do{ ?>
                                    <tr>
                                        <td>
                                            <a class="example-image-link" data-lightbox="example-1" href="upload/<?php echo $row['img_barang'];?>">
                                            <img class="example-image" src="upload/<?php echo $row['img_barang'];?>" style="width: 60px; height: 60px;">
                                            </a>
                                        </td>   
                                        <td class="align-middle"><?php echo $row['id_barang']; ?></td>
                                        <td class="align-middle"><?php echo $row['nama_barang']; ?></td>
                                        <td class="align-middle">IDR <?php echo $row['harga_barang'];?></td>
                                        <td class="align-middle">
                                            <a href="produk.php?deleteId=<?= $row['id_barang']?>" class="btn btn-sm btn-danger">
                                                &nbsp;Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php }while($row=mysqli_fetch_array($sql))?>
                                </tbody>
                        </table>
                </div>
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