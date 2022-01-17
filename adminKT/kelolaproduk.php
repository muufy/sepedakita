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
            <div class="container-fluid">
		        <div class="container">
        <!-- START FORM -->
        <a href="produk.php" class="btn btn-secondary active" role="button" aria-pressed="true">Back</a>
			<div class="row justify-content-center">
				<div class="col-md-8 bg-abu">
					<form method="post" action="authprod.php" enctype="multipart/form-data">
					    <?php if(isset($_GET['succeed'])){?>
					                <div class="mt-3 col-lg-12 text-center">
					                    <div class="alert alert-success" style="color:green;">
					                        <b>Order successfully created</b>
					                    </div>
					                </div>
					    <?php }?>
						<h3 class="display-5 pb-3 pt-5">Add Product</h3>
                        <div class="form-group">
                        <label>Jenis Product :</label>
						    <select id="Select" class="form-control" name="jenis">
                                <option selected>Choose...</option>
                                <option value="sepeda">Sepeda</option>
                                <option value="aksesoris">Aksesoris</option>
                            </select>
                        </div>

                        <div class="form-group">
						   <label>Nama Product :</label>
						   <input required autocomplete="off" maxlength="255"  type="text" class="form-control" name="namaproduct">
                        </div>

                        <div class="form-group">
						    <label>Tipe Produk :</label>
						    <input required autocomplete="off" maxlength="255" type="text" class="form-control" name="tipeproduct">
						</div>

                        <div class="form-group">
						    <label>Brand Produk :</label>
						    <input required autocomplete="off" maxlength="255" type="text" class="form-control" name="brand">
						</div>

                        <div class="form-group">
						    <label>Harga Product :</label>
						    <input required autocomplete="off" maxlength="12" type="currency" class="form-control" name="hargaproduct">
						</div>

                        <div class="form-group">
						    <label>Stock Product :</label>
						    <input required autocomplete="off" maxlength="12" type="number" class="form-control" name="stock">
						</div>

						<div class="form-group">
						    <label>Deskripsi Produk :</label>
						    <textarea required autocomplete="off" maxlength="255" type="text" class="form-control" name="deskripsiproduct"></textarea>
						</div>

						<div class="form-group">
							<label>Gambar Product :</label>
							<br><input type="file" name="imgbarang" id="imgbarang"><br>
						</div>
                        
                        <div class="text-center">
                            <label>Spesifikasi Produk<br>*Opsional*</label>
                        </div>

                        <div class="row">  
                            <div class="col mb-2">
                                <label>Opsional 1</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi1" placeholder="Title Opsi 1"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi1" placeholder="Koten Opsi 1"></input>
                            </div>
                            <div class="col mb-2">
                                <label>Opsional 2</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi2" placeholder="Title Opsi 2"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi2" placeholder="Koten Opsi 2"></input>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col mb-2">
                                <label>Opsional 3</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi3" placeholder="Title Opsi 3"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi3" placeholder="Koten Opsi 3"></input>
                            </div>
                            <div class="col mb-2">
                                <label>Opsional 4</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi4" placeholder="Title Opsi 4"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi4" placeholder="Koten Opsi 4"></input>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col mb-2">
                                <label>Opsional 5</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi5" placeholder="Title Opsi 5"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi5" placeholder="Koten Opsi 5"></input>
                            </div>
                            <div class="col mb-2">
                                <label>Opsional 6</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi6" placeholder="Title Opsi 6"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi6" placeholder="Koten Opsi 6"></input>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col mb-2">
                                <label>Opsional 7</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi7" placeholder="Title Opsi 7"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi7" placeholder="Koten Opsi 7"></input>
                            </div>
                            <div class="col mb-2">
                                <label>Opsional 8</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi8" placeholder="Title Opsi 8"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi8" placeholder="Koten Opsi 8"></input>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col mb-2">
                                <label>Opsional 9</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi9" placeholder="Title Opsi 9"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi9" placeholder="Koten Opsi 9"></input>
                            </div>
                            <div class="col mb-2">
                                <label>Opsional 10</label>
                                <input maxlength="255" type="text" class="form-control mb-2" name="title_opsi10" placeholder="Title Opsi 10"></input>
                                <input maxlength="255" type="text" class="form-control" name="opsi10" placeholder="Koten Opsi 10"></input>
                            </div>
                        </div>
                        
                        <div class="p-2">
                            <a class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal">
                                Confirm
                            </a>
                        </div>
						<!-- MODAL UPLOAD BUKTI BAYAR -->
						<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-body">
									<div class="text-center">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h5 id="exampleModalLabel">Tambahkan Produk?</h5>
                                        <div class="text-center"><label>*Pastikan Data yang dimasukan benar!</label></div>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<input required type="submit" class="btn btn-primary" name="addproduct" value="Input"></input> 
									</div>
								</div>
								</div>
							</div>
						</div>
						<!-- End MODAL -->
					</form>	
				</div>
			</div>
			<!-- END FORM -->
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