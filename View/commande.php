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
          <li><a href="index.php">Accueil</a></li>
          <li><a href="presentation.php">Qui sommes nous ?</a></li>
          <li><a href="offre.php">Nos offres</a></li>

          <?php
          if(isset($_SESSION["utilisateur"])){
          ?>
          <li><a href="pointRelais.php">Vos point relais</a></li>
          <li class="active"><a href="commande.php">Commande</a></li>   
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


    <main id="main" style="padding-top:7%;">

        <div class="section-title" data-aos="fade-up">
            <h2>Commande</h2>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="choix-paiement align-items-center">
            <div class="col-lg-7 col-md-12">
            <a class="btn btn-primary" href="#ajouterCommande" role="button">Ajouter une Commande</a>
            </div>
            <div class="col-lg-6 col-md-12">
            <a class="btn btn-primary" href="#voirCommande" role="button">Voir mes commandes</a>
            </div>
           
            </div>
        </div>


        <div id="ajouterCommande">
                <?php
                        $utlisateur = new Utilisateur();
                        $utlisateur = Utilisateur::fetch($_SESSION["utilisateur"]);

                        PointRelais::ConvertirPointRelaisEnJson();
                        $pointRelais = new PointRelais();
                        $pointRelais = $utlisateur->getPointRelais();



                ?>

                <div class="container pt-5">
                    <div class="row justify-content-md-center pt-5">
                    
                        <div class="col-lg-10">
                            
                            <div class="etape">
                                <div class="cercle">
                                    <p class="text-center">1</p>                       
                                </div>  
                                <h2>Commander en ligne</h2>                         
                            </div>
                            <p class="text-justify pt-3">Commandez en ligne sur le site de votre choix en utilisant l’adresse de relais fournie
                                par notre service. et <strong>envoyer la confirmation de commande à l'adresse suivante : pickmeup.afrique@gmail.com</strong></p>
                        </div>


                        <div class="col-lg-10 pt-5">
                            
                            <div class="etape">
                                <div class="cercle">
                                    <p class="text-center">2</p>                       
                                </div>  
                                <h2>Votre adresse de Point-Relais en Europe</h2>                         
                            </div>
                            <?php
                                if($pointRelais != null)
                                {

                                
                            ?>
                            <p class="text-justify pt-3"><u> <strong>Saisir les informations suivantes lors d'une commande :</strong> </u></p>
                            <p class="text-justify pt-3">Nom :  <?php echo htmlspecialchars($pointRelais->getNom()); ?></p>
                            <p class="text-justify pt-3">Adresse :  <?php echo htmlspecialchars($pointRelais->getAdresseRue()); ?></p>
                            <p class="text-justify pt-3">Ville :  <?php echo htmlspecialchars($pointRelais->getAdresseVille()); ?></p>
                            <p class="text-justify pt-3">Code Postal :  <?php echo htmlspecialchars($pointRelais->getAdresseCodePostal()); ?></p>
                            <p class="text-justify pt-3">Pays :  <?php echo htmlspecialchars($pointRelais->getPays()->getNomPays()); ?></p>

                            <?php
                              }  else{
                            ?>
                                <h4 class="pt-3" style="color:red;">Vous n'avez de point relais attribué en Europe</h4>
                            <?php
                                }
                            ?>

                        </div>



                        <div class="col-lg-10 pt-5 pb-3">
                            
                                <div class="etape">
                                    <div class="cercle">
                                        <p class="text-center">3</p>                       
                                    </div>  
                                    <h2>Choisir votre mode de livraison</h2>  

                                </div>

                                    <div id="modeLivraison">
                                        <form method="post" action="../forms/formulaireAjouterCommande.php">
                                            <div class="form-check pt-3">                                                
                                                <input class="form-check-input" type="checkbox" value="pt" name="modePointRelais" id="defaultCheck1" onchange="ClickPointRelais()">
                                                <label class="form-check-label" for="defaultCheck1">
                                                Point-Relais
                                                </label>
                                            </div>    
                                            <div id="lesPointsRelais">
                                                <select  class="form-control mt-3 mb-5" name="pointRelais">

                                                <option selected>Choisir un point Relais</option>
                                                <?php
                                                    $collectionPointRelais = PointRelais::fetchPublicPointRelais();

                                                    foreach($collectionPointRelais as $pointRelais)
                                                    {
                                                        if($pointRelais->getPays()->getCodePays() != "FR")
                                                        {
                                                ?>
                                                    <option value="<?php echo htmlspecialchars($pointRelais->getId()); ?>"><?php echo htmlspecialchars($pointRelais->getNom()); ?></option>
                                                            

                                                <?php
                                                        }
                                            

                                                    }
                                                ?>

                                                </select>

                        
                                            </div>

                                        
                                        </form>

                                        <form method="post" action="../forms/formulaireAjouterCommande.php">                
                                            <div class="form-check pt-3">
                                                <input class="form-check-input" type="checkbox" value="lv" name="modeLivraison" id="defaultCheck2"  onchange="clickAdresseLivraison()">
                                                <label class="form-check-label pb-4" for="defaultCheck2">
                                                    Livraison à la maison ou aux bureaux
                                                </label>

                                            </div>                    
                                                <?php
                                                    $livraison = new Livraison();

                                                    $livraison = Livraison::fetchByUtilisateur($_SESSION["utilisateur"]);

                                                ?>

                                            <div id="adresseLivraison">    

                                            <?php
                                                if(!is_bool($livraison)){

                                                
                                            ?>
                                                <p> adresse : <?php echo htmlspecialchars($livraison->getAdresseRue()); ?> </p>
                                                <p> telephone : <?php echo htmlspecialchars($livraison->getTelephone()); ?> </p>
                                                <p> Ville : <?php echo htmlspecialchars($livraison->getVille()->getNomVille()); ?> </p>
                                                <p> Pays : <?php echo htmlspecialchars($livraison->getVille()->getPays()->getNomPays()); ?> </p>
                                                <button type="submit" class="btn btn-primary">Ajouter une commande</button>                 
                                            </div>

                                            <?php
                                                }
                                                else {
                                            ?>
                                            <button type="button" class="btn btn-primary"><a href="mesInformations.php" style="color:white">Ajouter une adresse de livraison</a></button>   
                                            
                                            <?php


                                                }

                                            ?>


                                        </form>
                                        

                                    </div>
                        </div>                 
                    </div>
                </div>
            </div>

         <div id="voirCommande">   
                <div class="section-title" data-aos="fade-up">
                <h2>Voir mes commandes</h2>
            </div>
       
            <div class="container">

            <?php
            
            $collectionCommande = Commande::fetchByUtilisateur($_SESSION["utilisateur"]);   
            
            if(!empty($collectionCommande))
            {
                
            
            foreach($collectionCommande as $commande){
            
            ?>                           
                <div class="col-lg-12 mt-5">
                
                        <div class="card">
                            <h5 class="card-header">Numero de commande : <?php echo $commande->getIdCommande(); ?> </h5>
                                <div class="card-body">
                                    <p class="card-text">Date de la commande : <?php echo date('d/m/Y',$commande->getDateCommande()); ?></p>
                                    <p class="card-text">Etat : <?php echo $commande->getEtat(); ?></p>
                                    <?php 

                                    if($commande->getLivraison() != null)

                                    {
                                         $livraison = new Livraison();
                                         $livraison = $commande->getLivraison();

                                    ?>
                        
                                    <h4 class="card-subtitle mb-2 text-muted"><u>Adresse de livraison :</u></h4>
                                    <p class="card-text">adresse : <?php echo  $livraison->getAdresseRue(); ?></p>
                                    <p class="card-text">Telephone : <?php echo $livraison->getTelephone(); ?></p>
                                    <p class="card-text">Etat : <?php echo $livraison->getEtat(); ?></p>
                                    <p class="card-text">Ville : <?php echo $livraison->getVille()->getNomVille(); ?></p>                                                           
                                    <p class="card-text">Pays : <?php echo $livraison->getVille()->getPays()->getNomPays(); ?></p>          


                                    <?php        
                                    }
                                    else
                                    {

                                        $pointRelais = new PointRelais();
                                        $pointRelais = $commande->getPointRelaisAfrique();

                                    ?>


                                    <h4 class="card-subtitle mb-2 text-muted"><u>Point Relais :</u></h4>
                                    <p class="card-text">nom : <?php echo  $pointRelais->getNom(); ?></p>

                                    <?php
                                        if($pointRelais->getAdresseRue() != null)
                                        {

                                    ?>


                                            <p class="card-text">Adresse : <?php echo  $pointRelais->getAdresseRue(); ?></p>

                                    <?php
                                        }
                                        else if($pointRelais->getAdresseVille() != null) 
                                        {
                                    ?>


                                            <p class="card-text">Adresse : <?php echo  $pointRelais->getAdresseVille(); ?></p>


                                    <?php
                                        }

                                        else if($pointRelais->getAdresseCodePostal() != null)
                                        {

    
                                    ?>

                                         <p class="card-text">Code Postal : <?php echo  $pointRelais->getAdresseCodePostal(); ?></p>


                                    <?php    
                                        }
                                    ?>

                             

                                        <p class="card-text">Pays : <?php echo  $pointRelais->getPays()->getNomPays(); ?></p>

                                    <?php

                                    }
                                
                                    ?>




                                </div>

                               
                        </div>        
                
                </div>

            <?php
            }
        }
            ?>



            </div>
        </div>


    </main>

<script src="../assets/vendor/jquery/jquery.min.js"></script>
      <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
      <script src="../assets/vendor/php-email-form/validate.js"></script>
      <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
      <script src="../assets/vendor/counterup/counterup.min.js"></script>
      <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
      <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="../assets/vendor/venobox/venobox.min.js"></script>
      <script src="../assets/vendor/aos/aos.js"></script>
   
      <!-- Template Main JS File -->
      <script src="../assets/js/main.js"></script>

    
      <script src="../assets/js/commande.js"> </script>





</body>
</html>