<?php

session_start();


if($_SESSION["userAdmin"] == null)
{
  header('location: ../index.php');
}

include_once '../../../boostrap.inc.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>PICKME UP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->
    <link href="../../../assets/img/favicon.png" rel="icon">
    <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Vendor CSS Files -->
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet">
    <link href="../../../assets/css/stylepart2.css" rel="stylesheet">
    <!-- =======================================================
    * Template Name: Vesperr - v2.3.0
    * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    </head>


<body>

      <!-- ======= Header ======= -->
      <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="menu.php">Pickme <span style="color: #3498d3;">up</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pays
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="ajouter.php">Ajouter</a>
              <a class="dropdown-item" href="index.php">Consulter</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Ville
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../ville/ajouter.php">Ajouter</a>
              <a class="dropdown-item" href="../ville/index.php">Consulter</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Point Relais
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../pointrelais/ajouter.php">Ajouter</a>
              <a class="dropdown-item" href="../pointrelais/index.php">Consulter</a>
            </div>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Les commandes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../commande/index.php">Consulter</a>
            </div>
          </li>


          <?php
          if(isset($_SESSION["userAdmin"])){
          ?>
          <li class="get-started"><a href="../../forms/deconnexion.php">Se deconnecter</a></li>
  
          <?php
          }
          else { 
          ?>
          <li class="get-started"><a href="../index.php">Se connecter</a></li>
          <?php 
          }
          ?>

      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



  
  <main id="main" style="padding-top: 15%;">

    <div class="section-title" data-aos="fade-up">
      <h2>Ajouter un pays</h2>
    </div>
    <div class="container">

      <form action="../../forms/ajouterPays.php" method="post">

        <div class="form-group">
          <label for="exampleInputEmail1">Code Pays</label>
          <input type="text" class="form-control" name="codePays" placeholder="FR" maxlength="3">
        </div>
        
        <div class="form-group">
          <label for="exampleInputPassword1">Nom du Pays</label>
          <input type="text" class="form-control"name="nomPays" placeholder="FRANCE">
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>

      </form>

    </div>



  </main>

  <!-- Vendor JS Files -->
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <!-- <script src="../assets/vendor/php-email-form/validate.js"></script> -->
  <script src="../../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../../../assets/vendor/aos/aos.js"></script>
  <script src="../../../assets/js/animation.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
  <script src="../../../assets/js/mail.js"></script>
    
</body>
</html>