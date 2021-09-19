<?php include "../includes/db.php"; ?>
<?php session_start() ?>
<?php
if(isset($_SESSION["kullanici_yetki"])) {
        header ("Location: index.php");   
}
?>
<?php
 if (isset($_POST['giris'])) {
 $kullaniciad   = $_POST['kullaniciad'];
 $kullanicisifre =  $_POST['kullanicisifre'];
 $kullaniciad = mysqli_real_escape_string($connect,$kullaniciad); // bu fonksiyon posttan gelen bilgileri belirli karakterleri test ediyor. Güvenlik Fonskiyonudur
 $kullanicisifre =  mysqli_real_escape_string($connect,$kullanicisifre);
 $sorgu = "SELECT * FROM kullanici WHERE kullanici_isim = '{$kullaniciad}' ";
 $kullanici_sorgu = mysqli_query($connect,$sorgu);

if (!$kullanici_sorgu) {
  die("SORGU HATASI".mysqli_error($connect));
}
while ($row = mysqli_fetch_assoc($kullanici_sorgu)) {
     $db_kullanici_id = $row["kullanici_id"];
     $db_kullanici_isim= $row["kullanici_isim"];
     $db_kullanici_sifre= $row["kullanici_sifre"];
     $db_kullanici_email= $row["kullanici_email"];  
     $db_kullanici_yetki= $row["kullanici_yetki"];
}


if ($kullaniciad !== $db_kullanici_isim && $kullanicisifre !== $db_kullanici_sifre) {
  header("Location :giris.php");
  
}
else if ($kullaniciad == $db_kullanici_isim && $kullanicisifre == $db_kullanici_sifre)
{
  $_SESSION['kullaniciad'] = $db_kullanici_isim;
  $_SESSION['kullanicisifre'] = $db_kullanici_sifre;
  $_SESSION['kullanici_email'] = $db_kullanici_email;
  $_SESSION['kullanici_yetki'] = $db_kullanici_yetki;
  header("Location: index.php");
}
else {
  header("Location:giris.php");

  }

  }




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

  
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

   
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
                <label for="inputUsername">Kullanıcı Adı</label>
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