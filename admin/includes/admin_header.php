 <?php  ob_start();    ?>
 <?php
 include "../includes/db.php";  ?>
 <?php session_start(); ?>

 <?php   
 if(!isset($_SESSION['kullanici_yetki']))
 {
    header("Location: ../index.php");
 }




   ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin </title>

  
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

   
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

   
    <link href="css/sb-admin.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  </head>

  <body id="page-top">



    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="../">M&B İnşaat Sitesi</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar Search -->
      <div class="d- d-md-inline-block form-inline ml-auto mr-2 mr-md-3 my-2 my-md-0">
      <a class="nav-link" href="cıkıs.php">
      <span>Çıkış Yap</span>
    <i class="fas fa-times"></i>
      </a>
      </div>
    </nav>
