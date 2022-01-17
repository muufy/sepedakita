<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Register</title>

	 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dcf78cbd5c.js" crossorigin="anonymous"></script>

    <!-- SCRIPT JS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<body class="body"> 

	<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center mb-3">
					<a href="index.php"><img src="images/logokt.png" class="img-fluid"></a>
				</div>
			</div>
	</div>

			<!-- START FORM -->
			<div class="bg-putih">
			<div class="row justify-content-center">
				<div class="col-md-8 p-3">
					<form method="post" action="auth/auth.php" enctype="multipart/form-data">
						<h3 class="font-weight-normal text-center pt-3">Register</h3>	
						<?php if(isset($_GET['double'])){?>
					                <div class="mt-3 col-lg-12 text-center">
					                    <div class="alert alert-warning">
					                        <b>Email sudah terdaftar</b>
					                    </div>
					                </div>
					    <?php }?>
						

						 <div class="form-group">
						   <label>Fullname :</label>
						   <input required autocomplete="off" maxlength="26" type="text" class="form-control" name="fullname" placeholder="Fullname must be filled">
						 </div>
						 <div class="form-group">
						   <label>Email :</label>
						   <input required autocomplete="off" maxlength="26" type="mail" class="form-control" name="email" placeholder="Email must be filled">
						 </div>
						<div class="form-group">
						    <label>Password :</label>
						    <input required autocomplete="off" maxlength="12" pattern="[a-zA-Z0-9]{4,12}" type="password" class="form-control" name="password" placeholder="Password length must be between 4 to 12 characters only">
						</div>
						<div class="form-group">
						    <label>Confirm Password :</label>
						    <input required autocomplete="off" maxlength="12" pattern="[a-zA-Z0-9]{4,12}" type="password" name="confirm_password" class="form-control" placeholder="Re-type your Password">
						</div>
						<div class="form-group">
						    <label>Phone Number :</label>
						    <input required autocomplete="off" maxlength="15" pattern="[0-9]" type="number" name="phone" class="form-control" placeholder="Phone Number must be filled">
						</div>
						<div class="form-group">
							<label>Kota :</label>
							<select id="Select" class="form-control mb-3" name="kota" >
                				<option selected>Choose...</option>
								<option value="jaktim">Jakarta Timur</option>
								<option value="jakut">Jakarta Utara</option>
								<option value="jaksel">Jakarta Selatan</option>
								<option value="jakbar">Jakarta Barat</option>
								<option value="depok">Depok</option>
								<option value="bekasikota">Kota Bekasi</option>
								<option value="bekasikab">Kabupaten Bekasi</option>
            				</select>
							<div class="text-right"><label>*Layanan Delivery Hanya Tersedia Untuk Daerah pada pilihan ini!</label></div>
						</div>
						<div class="form-group">
						    <label>Address :</label>
						    <textarea required autocomplete="off" maxlength="255" pattern="[a-zA-Z0-9]{4,12}" type="address" name="alamat" class="form-control" placeholder="Address must be filled"></textarea>
						</div>
						

						<div class="text-center p-3"><a href="login.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
						<input required type="submit" class="btn btn-primary" name="register" value="   Register   "></input></div>
					</form>	
				</div>
			</div></div>
			<!-- END FORM -->

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>