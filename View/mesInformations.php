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
          <li ><a href="index.php">Accueil</a></li>
          <li><a href="presentation.php">Qui sommes nous ?</a></li>
          <li><a href="offre.php">Nos offres</a></li>

          <?php
          if(isset($_SESSION["utilisateur"])){
          ?>
          <li><a href="pointRelais.php">Vos point relais</a></li>
          <li><a href="commande.php">Commande</a></li>          
          <li class="active"><a href="mesInformations.php">Mon compte</a></li>
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
      <h2>Mes informations</h2>
    </div>

    <?php

    ?>




    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

    <?php

      $utilisateur = Utilisateur::fetch($_SESSION["utilisateur"]);

      $_SESSION["objUser"] = $utilisateur;

    ?>

    <div class="container">
    <form action= "../forms/modificationInfoUtilisateur.php" method="post" id="formInscription">
                <div class="row">

                  <div class="col-lg-6 col-sm-12" id="nom">
                    <label for="exampleFormControlInput1">Nom</label> 
                    <input class="form-control" name="nom" type="text" placeholder="Dupont" value="<?php echo $utilisateur->getNom(); ?>" >
                  </div>

                  <div class="col-lg-6 col-sm-12" id="prenom">
                    <label for="exampleFormControlInput1">Prenom</label> 
                    <input class="form-control" name ="prenom"type="text" placeholder="Pierre" value="<?php echo $utilisateur->getPrenom(); ?>">
                  </div>

                </div>

                <div class="row pt-4">

                    <div class="col-lg-6 col-sm-12" id="email">
                    <label for="exampleFormControlInput1">E-mail</label> 
                    <input type="email" class="form-control" name="email"id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="aaaaa@zzz.com" value="<?php echo $utilisateur->getEmail(); ?>">
                  </div>

                  <div class="col-lg-6 col-sm-12" id="ville">   
                    <label for="exampleFormControlInput1">Ville</label>
                    <select  class="form-control" name="ville">
                      <?php
                        $collectionVille = Ville::fetchAll();

                        foreach($collectionVille as $ville)
                        {
                        if($ville->getCodeVille() == $utilisateur->getAdresseVille()->getCodeVille()){

                        
                        ?>
                        
                          <option value="<?php echo $ville->getCodeVille(); ?>" selected><?php echo $ville->getNomVille(); ?></option>
                        <?php
                          }else{

                        ?>

                          <option value="<?php echo $ville->getCodeVille(); ?>"><?php echo $ville->getNomVille(); ?></option>

                        <?php
                          }
                        }
                        ?>
                       
                    </select>
                  </div>


    
                </div>

                <div class="row pt-4">
                  
                  <div class="col-lg-6 col-sm-12 " id="adresse">
                    <label for="exampleFormControlInput1">Adresse Rue</label>
                    <input class="form-control" name="adresseRue" type="text" value="<?php echo $utilisateur->getAdresseRue(); ?>">
                  </div>


                  <?php
                  if($utilisateur->getEtat() != null){
                  
                  ?>

                  <div class="col-lg-6 col-sm-12 " id="etat">
                    <label for="exampleFormControlInput1">Etat</label>
                    <input class="form-control" name="etat" type="text" value="<?php echo $utilisateur->getEtat(); ?>">
                  </div>


                  <?php

                  }else {

                  ?>
                  <div class="col-lg-6 col-sm-12 " id="etat">
                    <label for="exampleFormControlInput1">Adresse Postal</label>
                    <input class="form-control" name="adressePostal" type="text" value="<?php echo $utilisateur->getAdressePostal(); ?>">
                  </div>

                  <?php } ?>
                  
                  


                </div>

                <div class="row pt-4">

                <div class="col-lg-12 col-sm-12" id="telephone">
                  <label for="exampleFormControlInput1">Numéro de télephone</label> 
                  <input type="text" name="telephone" class="form-control" value="<?php echo $utilisateur->getTelephone(); ?>" >
                </div>
  
              </div>
                <button type="submit" class="btn btn-primary mt-3">Modifier</button>

              </div>
           </form>

    </div>


    </section><!-- End Services Section -->

    <div class="section-title" data-aos="fade-up">
      <h2>Adresse de livraison</h2>
    </div>



<section id="services" class="services">

<?php
  $livraison = new Livraison();
 $p =  Livraison::ExisteUtilisateur($_SESSION["utilisateur"]);
  if($p == 0){

?>


<div class="container">
<form action= "../forms/formulaireAjouterLivraison.php" method="post" id="formInscription">
                  <div class="row">

                    <div class="col-lg-6 col-sm-12" id="nom">
                      <label for="exampleFormControlInput1">Adresse Rue</label> 
                      <input class="form-control" name="adresseRue" type="text" >
                    </div>

                    <div class="col-lg-6 col-sm-12" id="prenom">
                      <label for="exampleFormControlInput1">Ville</label> 
                      <select  class="form-control" name="ville">
                      <?php
                        $collectionVille = Ville::fetchPublicVille();

                        foreach($collectionVille as $ville)
                        {

                        ?>    
                          <option value="<?php echo $ville->getCodeVille(); ?>"><?php echo $ville->getNomVille(); ?></option>
                           
                        <?php
                          
                        }
                        ?>
                       
                    </select>
                    </div>

                  </div>

                  <div class="row pt-4">

                        <div class="col-lg-6 col-sm-12" id="nom">
                          <label for="exampleFormControlInput1">Etat</label> 
                          <input class="form-control" name="etat" type="text" >
                        </div>

                        <div class="col-lg-6 col-sm-12" id="prenom">
                          <label for="exampleFormControlInput1">Telehone</label> 
                          <input class="form-control" name ="telephone" type="text"  >
                        </div>

                  </div>




            <button type="submit" class="btn btn-primary mt-3">Ajouter</button>                  
            </form>



</div>

  






<?php
    
  }
  else{
    $livraison = new Livraison();
    $livraison =  Livraison::fetchByUtilisateur($_SESSION["utilisateur"]);

    $_SESSION["objLivraison"] = $livraison;
  ?>



<div class="container">
<form action= "../forms/formulaireModificationLivraison.php" method="post" id="formInscription">
                  <div class="row">

                    <div class="col-lg-6 col-sm-12" id="nom">
                      <label for="exampleFormControlInput1">Adresse Rue</label> 
                      <input class="form-control" name="adresseRue" type="text" value="<?php echo $livraison->getAdresseRue() ?>">
                    </div>

                    <div class="col-lg-6 col-sm-12" id="prenom">
                      <label for="exampleFormControlInput1">Ville</label> 
                      <select  class="form-control" name="ville">
                      <?php
                        $collectionVille = Ville::fetchAll();

                        foreach($collectionVille as $ville)
                        {
                        if($ville->getCodeVille() == $livraison->getVille()->getCodeVille()){

                        
                        ?>
                        
                          <option value="<?php echo $ville->getCodeVille(); ?>" selected><?php echo $ville->getNomVille(); ?></option>
                        <?php
                          }else{

                        ?>

                          <option value="<?php echo $ville->getCodeVille(); ?>"><?php echo $ville->getNomVille(); ?></option>

                        <?php
                          }
                        }
                        ?>
                       
                    </select>
                    </div>

                  </div>

                  <div class="row pt-4">

                        <div class="col-lg-6 col-sm-12" id="nom">
                          <label for="exampleFormControlInput1">Etat ou Code Postal</label> 
                          <input class="form-control" name="etat" type="text" value="<?php echo $livraison->getEtat(); ?>">
                        </div>

                        <div class="col-lg-6 col-sm-12" id="prenom">
                          <label for="exampleFormControlInput1">Telephone</label> 
                          <input class="form-control" name ="telephone" type="text"  value="<?php echo $livraison->getTelephone(); ?>">
                        </div>

                  </div>




            <button type="submit" class="btn btn-primary mt-3">Modifier</button>                  
            </form>



</div>




<?php
  }


?>
           

</div>



</section><!-- End Services Section -->


    <div class="section-title" data-aos="fade-up">
      <h2>Supprimer Mon compte</h2>
    </div>

    <div class="container">
        <form action= "../forms/supprimerCompte.php" method="post">
              <div class="form-group" id="nom">
                <label for="exampleFormControlInput1">Saisir votre mot de Passse</label> 
                <input class="form-control" name="motDePasse" type="password" required>
              </div>

              <button type="submit" class="btn btn-danger mt-3">Supprimer</button>                  
        </form>
    </div>




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