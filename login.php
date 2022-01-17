<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dcf78cbd5c.js" crossorigin="anonymous"></script>


    <title>Login</title>
  </head>
  <body class="body text-center"> 
        <a href="index.php"><img src="images/logokt.png" class="img-fluid p-4"></a>
  <div class="bg-putih">
    <form class="form-signin" method="post" action="ceklogin_member.php">
    <h2 class="p-3">Login</h2>
        <div>
            <div class="form-group text-left">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Your Email Address" name="email">
            </div>
            <div class="form-group text-left">
                <label>Password</label>
                <input  type="password" class="form-control" placeholder="Your Password" name="password">
            </div>
        </div>
        <input type="submit" class="btn btn-outline-primary btn-md btn-block" name="login" value="Login">
        <label class="text-center pt-3">Don't Have an Account?<a href="register.php">Register Now</a></label>

        <?php if(isset($_GET['loginerror'])){?>
                <div class="mt-3 col-lg-12 text-center">
                    <div class="alert alert-danger" style="color:red;">
                        <b>Email dan Password Salah!</b>
                    </div>
                </div>
        <?php }?>
    </form></div>

    <div class="container-fluid bg-lightgray fixed-bottom" id="contacts">
        <div class="container">
            <div class="row justify-content-center pt-4">
                <div class="align-bottom">
                    <h5>FIND US</h5>
                    <p><a href=""><img src="images/icon-ig.png" class="img-fluid pr-3 ">sepedakt</a>
                    <a href=""><img src="images/icon-yt.png" class="img-fluid pr-3 ">Sepeda Kita</a>
                    <a href=""><img src="images/icon-phone.png" class="img-fluid pr-3 ">021-123456</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>