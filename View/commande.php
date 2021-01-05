<?php
session_start();
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
  
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
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
          <li class="active"><a href="#index.php">Accueil</a></li>
          <li><a href="presentation.html">Qui sommes nous ?</a></li>
          <li><a href="offre.html">Nos offres</a></li>

          <?php
          if(isset($_SESSION["utilisateur"])){
          ?>
          <li><a href="pointRelais.php">Vos point relais</a></li>
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
            <div class="col-lg-6 col-md-12">
                 <button type="button" class="btn btn-outline-primary " onclick="AddCommande()">Ajouter une commande</button>
            </div>
            <div class="col-lg-6 col-md-12">
                <button type="button" class="btn btn-outline-primary " onclick="ViewCommande()">Voir mes commandes</button>
            </div>
           
            </div>
        </div>


        <div id="ajouterCommmande ">
            <?php
                    $utlisateur = new Utilisateur();
                    $utlisateur = Utilisateur::fetch($_SESSION["utilisateur"]);


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
                            par notre service.</p>
                    </div>


                    <div class="col-lg-10 pt-5">
                        
                        <div class="etape">
                            <div class="cercle">
                                <p class="text-center">2</p>                       
                            </div>  
                            <h2>Votre adresse de Point-Relais en Europe</h2>                         
                        </div>
                        <p class="text-justify pt-3"><u> <strong>Saisir les informations suivantes lors d'une commande :</strong> </u></p>
                        <p class="text-justify pt-3">Nom :  <?php echo $pointRelais->getNom(); ?></p>
                        <p class="text-justify pt-3">Adresse :  <?php echo $pointRelais->getAdresseRue(); ?></p>
                        <p class="text-justify pt-3">Ville :  <?php echo $pointRelais->getAdresseVille(); ?></p>
                        <p class="text-justify pt-3">Code Postal :  <?php echo $pointRelais->getAdresseCodePostal(); ?></p>
                        <p class="text-justify pt-3">Pays :  <?php echo $pointRelais->getPays()->getNomPays(); ?></p>

                    </div>



                    <div class="col-lg-10 pt-5 pb-3">
                        
                            <div class="etape">
                                <div class="cercle">
                                    <p class="text-center">3</p>                       
                                </div>  
                                <h2>Choisir votre mode de livraison</h2>                         
                            </div>

                                <div id="modeLivraison">
                                    <div class="form-check pt-3">                                                
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onclick="ClickPointRelais()">
                                         <label class="form-check-label" for="defaultCheck1">
                                        Point-Relais
                                        </label>
                                        
                                        <select  class="form-control mt-3 mb-5" name="pointRelais">

                                        <option selected>Choisir un point Relais</option>
                                        <?php
                                            $collectionPointRelais = PointRelais::fetchAll();

                                            foreach($collectionPointRelais as $pointRelais)
                                            {
                                                if($pointRelais->getPays()->getCodePays() != "FR")
                                                {
                                        ?>
                                            <option value="<?php echo $pointRelais->getId(); ?>"><?php echo $pointRelais->getNom(); ?></option>
                                                    

                                        <?php
                                                }
                                    

                                            }
                                        ?>

                                        </select>






                                    </div>
                                                           
                                    <div class="form-check pt-3">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                                        <label class="form-check-label" for="defaultCheck2">
                                            Livraison à la maison ou aux bureaux
                                        </label>
                                    </div>

                                </div>

                    </div>

                    
                </div>

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

    
      <script>
    function ClickPointRelais(){





    }


    const selectElement = document.getElementById('modeLivraison').children[0].children[2];   
    let info;
    selectElement.addEventListener('change', function() {   
        
        if(document.getElementById('infoPointRelais') !=  null)
        {
            let element = document.getElementById('infoPointRelais')
            element.remove();
        }

        var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                const lesPointRelais = JSON.parse(this.responseText);

                for(let i = 0; i< lesPointRelais.length; i++)
                {
                    if(lesPointRelais[i].id == selectElement.value)
                    {

                        let pointRelaisLecture = lesPointRelais[i];
                  
                        
                        let infoPointRelais  = document.getElementById('infoPointRelais');

                        if(infoPointRelais == null)
                        {
                            info = document.createElement("div");
                            info.id = "infoPointRelais";
                            selectElement.parentNode.appendChild(info);
                            
                            console.log(pointRelaisLecture);

                            Object.keys(pointRelaisLecture).forEach(function(key) {
                                console.table('Key : ' + key + ', Value : ' + pointRelaisLecture[key]);

                                if(pointRelaisLecture[key] != "" && key != "id" ){

                                    if(key == "pays"){
                                        let c = pointRelaisLecture[key]
                                        Object.keys(c).forEach(function(k) {


                                            let paragraphe = document.createElement("p");
                                            if(k != "codePays"){

                                            paragraphe.innerText = ` ${key} :  ${c[k]}`;
                                            document.getElementById('infoPointRelais').appendChild(paragraphe);
                                            }


                                        });


                                    }else{


                                    let paragraphe = document.createElement("p");
                                    paragraphe.innerText = ` ${key} :  ${pointRelaisLecture[key]}`;
                                    document.getElementById('infoPointRelais').appendChild(paragraphe);

                                    }

                                }

                            });



                               
                        }

                    }

                }

                
            }
        };
        xhttp.open("GET", "../assets/json/pointRelais.json", true);
        xhttp.send();

       

              
    });



      </script>





</body>
</html>