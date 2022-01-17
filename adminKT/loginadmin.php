<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="../css/loginadmin.css">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dcf78cbd5c.js" crossorigin="anonymous"></script>

    <title>Login Admin</title>
  </head>
  <body class="body">
    <!-- START SIGN IN -->
    
        <!-- START LOGO -->
        <img src="../images/logokt.png" class="rounded mx-auto d-block" id="logo">
        <!-- END LOGO -->

        <form class="form-signin" method="post" action="ceklogin_admin.php" id="form">
        <h1 class="h3 mb-3 font-weight-normal" id="form">Please sign in</h1>
        <!-- START USERNAME -->
        <label for="username" class="sr-only">Username</label>
        <input  type="text"  class="form-control" placeholder="Username" name="username">
        <!-- END USERNAME -->

        <!-- START PASSWORD -->
        <label for="password" class="sr-only">Password</label>
        <input  type="password" class="form-control mt-3" placeholder="Password" name="password">
        <!-- END PASSWORD -->

        <input type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="Login">

        <?php if(isset($_GET['loginerror'])){?>
                <div class="mt-3 col-lg-12 text-center">
                    <div class="alert alert-danger" style="color:red;">
                        <b>Username dan Password Salah!</b>
                    </div>
                </div>
        <?php } ?>
    </form>
    <!-- END SIGN IN -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    
  </body>
</html>