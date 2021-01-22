<?php
session_start();
include_once '../boostrap.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Comment acheter des produits depuis l'afrique ?</title>
  <meta content="Acheter sur tous les sites et se faire livrer à son domicile ou à son bureau en Afrique." name="description">
  <meta content="envoyer, colis, afrique,Service,Europe,Brazzaville,Pointe-Noire,Kinshasa,Start-up,pickmeup pickme up Afrique" name="keywords">

  
  <link rel="shortcut icon" href="../assets/img/iconpickmeup.ico" type="image/x-icon">



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
        <h1 class="text-light"><a href="index.php">Pickme <span style="color: #3498d3;">up</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#index.php">Accueil</a></li>
          <li><a href="presentation.php">Qui sommes nous ?</a></li>
          <li><a href="offre.php">Nos offres</a></li>

          <?php
          if(isset($_SESSION["utilisateur"])){
          ?>
          <li><a href="pointRelais.php">Vos point relais</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Recevez vos colis de manière très simple</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Acheter vos articles et on s'occupe de les envoyer</h2>

        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="../assets/img/—Pngtree—hand drawn wind cartoon cute_4045140.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <div class="section-title" data-aos="fade-up">
      <h2>Vous pouvez acheter sur de nombreux site</h2>
    </div>
    <!-- ======= Clients Section ======= -->

                  <div style="overflow: auto-hidden;">
                      <div class="care">
                        <div class="img-px">
                          <img src="../assets/img/image-entreprise/loding.jpeg" class="img-fluid" alt="loding">
                        </div>
                        <div class="img-px">
                          <img src="../assets/img/image-entreprise/asos.jpeg" class="img-fluid" alt="asos">
                        </div>
                        <div class="img-px">
                          <img src="../assets/img/image-entreprise/boohoo.jpeg" class="img-fluid" alt="boohoo" >
                        </div>
                        <div class="img-px">
                          <img src="../assets/img/image-entreprise/aliexpress.jpeg" class="img-fluid" alt="aliexpress" >
                        </div>
                        <div class="img-px">
                          <img src="../assets/img/image-entreprise/pretty.jpeg" class="img-fluid" alt="pretty" >
                        </div>
                        <div class="img-px">
                          <img src="../assets/img/image-entreprise/cdiscount.jpeg" class="img-fluid" alt="cdiscount" >
                        </div>
                       <div class="img-px">
                          <img src="../assets/img/image-entreprise/amazon.jpeg" class="img-fluid" alt="amazon" >
                        </div>
                      </div>
                  </div>


      </div>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Vos avantages</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-truck"></i></div>
              <h4 class="title"><a href="">Livraison</a></h4>
              <p class="description">Un suivi en ligne de votre livraison jusqu'au point d'arrivée.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-hands-helping"></i></div>
              <h4 class="title"><a href="">Offre</a></h4>
              <p class="description">Des produits qui peuvent répondre à vos besoins en temps réel. </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-money-check-alt"></i></div>
              <h4 class="title"><a href="">Economique</a></h4>
              <p class="description">Nous proposons des tarifs abordables et accessible à l'ensemble de nos futur clients</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-concierge-bell"></i></div>
              <h4 class="title"><a href="">Service</a></h4>
              <p class="description">Un service client qui sont à l'écoute des clients et réactifs</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


   

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contactez-nous</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Pickme up</h3>
              <p> Voici nos réseaux sociaux.</p>
              <div class="social-links">
              <!-- <a href="#" class="twitter"><i class="icofont-twitter"></i></a> -->
                <a href="https://m.facebook.com/pickmeup.africa/" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/pickmeup_africa/?igshid=16puj9w4a5p3i" class="instagram"><i class="icofont-instagram"></i></a>
               <!-- <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>-->
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>Immeuble Coray-Residence de la musique Tambourinée</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>pickmeup.afrique@gmail.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>+242 06 943 9233</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="../forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Object" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
                <div class="validate"></div>
              </div>
              <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your message was sent successfully.
            </div>
              <div class="text-center"><button type="submit">Envoyer un Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <a class="float" target="_blank" onclick="myFunction()">
    <i class="fab fa-whatsapp my-float"></i>
</a>


<div id="message">

        <div class="apercu">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967c-.273-.099-.471-.148-.67.15c-.197.297-.767.966-.94 1.164c-.173.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.018-.458.13-.606c.134-.133.298-.347.446-.52c.149-.174.198-.298.298-.497c.099-.198.05-.371-.025-.52c-.075-.149-.669-1.612-.916-2.207c-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372c-.272.297-1.04 1.016-1.04 2.479c0 1.462 1.065 2.875 1.213 3.074c.149.198 2.096 3.2 5.077 4.487c.709.306 1.262.489 1.694.625c.712.227 1.36.195 1.871.118c.571-.085 1.758-.719 2.006-1.413c.248-.694.248-1.289.173-1.413c-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214l-3.741.982l.998-3.648l-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" fill="#626262"/></svg>
            <h5 class="text-start"> Parler à un conseiller</h5>
            <p style="font-size: 14px;" class="pb-3">Choisissez un de nos conseillers pour continuer sur whatsapp</p>
        </div>

        <?php
            $collectionSav = Sav::fetchAll();

           
            foreach($collectionSav as $sav) 
            {
        ?>
        <div class="servicewhatsapp">
            
            <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967c-.273-.099-.471-.148-.67.15c-.197.297-.767.966-.94 1.164c-.173.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.018-.458.13-.606c.134-.133.298-.347.446-.52c.149-.174.198-.298.298-.497c.099-.198.05-.371-.025-.52c-.075-.149-.669-1.612-.916-2.207c-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372c-.272.297-1.04 1.016-1.04 2.479c0 1.462 1.065 2.875 1.213 3.074c.149.198 2.096 3.2 5.077 4.487c.709.306 1.262.489 1.694.625c.712.227 1.36.195 1.871.118c.571-.085 1.758-.719 2.006-1.413c.248-.694.248-1.289.173-1.413c-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214l-3.741.982l.998-3.648l-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" fill="#626262"/></svg>
            <div class="special-spacing"></div>
            <a href="https://api.whatsapp.com/send?phone=<?php echo $sav->getNumero() ?>"><?php echo $sav->getNom() ?></a>

        </div>

        <?php

            } 
        ?>


</div>

   <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Vesperr</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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

  <script>
  $('.carousel').carousel({
  interval: 1000
})
</script>

</body>

</html>