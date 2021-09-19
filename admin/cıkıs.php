
<?php session_start(); ?>
<?php

  $_SESSION['kullanici_isim'] = null;
  $_SESSION['kullanici_sifre'] = null ;
  $_SESSION['kullanici_email'] = null;
  $_SESSION['kullanici_yetki'] = null;
    
    header("Location: giris.php");
   ?> 


   

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Giriş</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Giriş</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" name="kullaniciad" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputUsername">Kullanıcı ADI</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="kullanicisifre" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Şifre</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name="giris" type="submit">Giriş</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>