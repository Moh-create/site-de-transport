<?php
session_start();

if($_SESSION["utilisateur"] == null)
{
  header('location: index.php');
}
include_once '../boostrap.inc.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>PICKME UP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link  rel = "shortcut icon"  href = "../assets/img/favicon_1.ico"  type = "image / x-icon" > 
  <link  rel = "icon"  href = "../assets/img/favicon_1.ico"  type = "image / x-icon" >
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/stylepart2.css" rel="stylesheet">
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
        <h1 class="text-light"><a href="index.html">Pickme <span style="color: #3498d3;">up</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="presentation.php">Qui sommes nous ?</a></li>
          <li><a href="offre.php">Nos offres</a></li>

          <?php
          if(isset($_SESSION["utilisateur"])){
          ?>
          <li class="active"><a href="pointRelais.php">Vos point relais</a></li>
          <li><a href="commande.php">Commande</a></li>          
          <li><a href="mesInformations.php">Mon compte</a></li>
          <li class="get-started"><a href="../forms/formulaireDeconnexion.php">Se deconnecter</a></li>

          <?php
          }
          else { 
          ?>
          <li class="get-started"><a href="connexion.html">Se connecter</a></li>
          <?php 
          }
          ?>
         

      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  
  <main id="main ">

    <div class="section-title" style="padding-top : 10%;" data-aos="fade-up">
      <h2>Nos point Relais</h2>
    </div>



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Confier vos colis à l'une de nos point relais</h2>
        </div>

        <div class="row">

          <?php 
            $collectionPointRelaisFrance = PointRelais::fetchByCountry("FR");
            foreach($collectionPointRelaisFrance as $lesPointRelais){

              if($lesPointRelais->getAfficher() == 1)
              {
                
            
          ?>

          
          <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
              <h4 class="title"><?php echo htmlspecialchars($lesPointRelais->getNom()); ?></h4>
              <p class="description">Adresse : <?php echo htmlspecialchars($lesPointRelais->getAdresseRue()); ?></p>
              <p class="description">Ville : <?php echo htmlspecialchars($lesPointRelais->getAdresseVille()); ?></p>
              <p class="description">Code  Postal : <?php echo htmlspecialchars($lesPointRelais->getAdresseCodePostal()); ?></p>
              <p class="description">Pays : <?php echo htmlspecialchars($lesPointRelais->getPays()->getNomPays()); ?></p>
            </div>

          </div>

          <?php
              }
            }
          ?>


        </div>

      </div>
    </section><!-- End Services Section -->


    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Faites vous livrez vos colis au point-relais</h2>
        </div>

        <div class="row justify-content-center">

          <?php 
            $collectionPointRelais = PointRelais::fetchAll();

            foreach($collectionPointRelais as $lesPointRelais){

              $nom = $lesPointRelais->getPays()->getCodePays(); 
              if($nom != "FR" && $lesPointRelais->getAfficher() == 1){

              


          ?>

          <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
              <h4 class="title"><?php echo htmlspecialchars($lesPointRelais->getNom()); ?></h4>


              <?php
              if($lesPointRelais->getAdresseRue() != null)
              {

              ?>


                  <p class="description">Adresse : <?php echo  htmlspecialchars($lesPointRelais->getAdresseRue()); ?></p>

              <?php
              }
              else if($lesPointRelais->getAdresseVille() != null) 
              {
              ?>


                  <p class="description">Adresse : <?php echo  htmlspecialchars($lesPointRelais->getAdresseVille()); ?></p>


          <?php
              }

              else if($lesPointRelais->getAdresseCodePostal() != null)
              {


          ?>

                <p class="description">Code Postal : <?php echo  htmlspecialchars($lesPointRelais->getAdresseCodePostal()); ?></p>


          <?php    
              }
          ?>

    

              <p class="description">Pays : <?php echo  htmlspecialchars($lesPointRelais->getPays()->getNomPays()); ?></p>

            </div>

          </div>

          <?php
              
              }
            }
          ?>


        </div>

      </div>
    </section><!-- End Services Section -->



  </main>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <!-- <script src="../assets/vendor/php-email-form/validate.js"></script> -->
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/js/animation.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/mail.js"></script>
    
</body>
</html>