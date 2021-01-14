<?php
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
          <li class="active"><a href="index.php">Accueil</a></li>
          <li><a href="presentation.php">Qui sommes nous ?</a></li>
          <li><a href="offre.php">Nos offres</a></li>
          <li class="get-started"><a href="connexion.html">Se connecter</a></li>

         

      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <main id="main" style="padding-top:5%">

    <div class="section-title" data-aos="fade-up">
      <h2 >Inscription</h2>
    </div>


    <div class="container">

        <div class="connexion mt-4">
            <form action= "../forms/formulaireInscription.php" method="post" id="formInscription">
                <div class="row">

                  <div class="col-lg-3 col-sm-12">
                    <label for="exampleFormControlInput1">Genre</label>
                    <select class="form-control" name="genre">
                        <option value="M">Mr</option>
                        <option value="F">Mme</option>
                    </select>
                  </div>

                  <div class="col-lg-5 col-sm-12" id="nom">
                    <label for="exampleFormControlInput1">Nom</label> 
                    <input class="form-control" name="nom" type="text" placeholder="Dupont" >
                  </div>

                  <div class="col-lg-4 col-sm-12" id="prenom">
                    <label for="exampleFormControlInput1">Prenom</label> 
                    <input class="form-control" name ="prenom"type="text" placeholder="Pierre">
                  </div>

                </div>

                <div class="row pt-4">

                    <div class="col-lg-6 col-sm-12" id="email">
                    <label for="exampleFormControlInput1">E-mail</label> 
                    <input type="email" class="form-control" name="email"id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="aaaaa@zzz.com">
                  </div>
    
                  <div class="col-lg-6 col-sm-12" id="motDePasse">
                    <label for="exampleFormControlInput1">Mot de passe</label> 
                    <input type="password" name="motDePasse" class="form-control" id="exampleInputPassword1">
                  </div>
    
                </div>

                <div class="row pt-4">

                  <div class="col-lg-6 col-sm-12" id="pays">   
                    <label for="exampleFormControlInput1">Pays</label>
                    <select  class="form-control" name="pays">
                      <?php

                      $collectionPays = Pays::fetchAll();

                      foreach($collectionPays as $pays)
                      {

                      ?>
                        <option value="<?php echo $pays->getCodePays(); ?>"><?php echo $pays->getNomPays(); ?></option>
                      
                      <?php
                      }
                      ?>

                    </select>
                  </div>

                  <div class="col-lg-6 col-sm-12" id="ville">   
                    <label for="exampleFormControlInput1">Ville</label>
                    <select  class="form-control" name="ville"  >
                      <?php
                        $collectionVille = Ville::fetchAll();

                        foreach($collectionVille as $ville)
                        {

                        ?>
                          <option value="<?php echo $ville->getCodeVille(); ?>"><?php echo $ville->getNomVille(); ?></option>

                        <?php
                        }
                        ?>
                       
                    </select>
                  </div>

                  
                  <div class="col-lg-6 col-sm-12 pt-4" id="adresse">
                    <label for="exampleFormControlInput1">Adresse Rue</label>
                    <input class="form-control" name="adresseRue" type="text" >
                  </div>


                  <div class="col-lg-6 col-sm-12 pt-4" id="codePostal">   
                    <label for="exampleFormControlInput1">Code Postal</label>
                    <input class="form-control" type="text" name="codePostal">
                  </div>                    

                </div>

                <div class="row pt-4">

                  <div class="col-lg-6 col-sm-12" id="indicatif">
                      <label for="exampleFormControlInput1">Numéro indicatif</label>
                      <select  class="form-control" name="numeroIndicatif">
                          <option>+33</option>
                          <option>+242</option>
                          <option>+243</option>
                      </select>
                </div>
  
                <div class="col-lg-6 col-sm-12" id="telephone">
                  <label for="exampleFormControlInput1">Numéro de télephone</label> 
                  <input type="number" name="telephone" class="form-control" >
                </div>
  
              </div>
                <button type="submit" class="btn btn-primary mt-3">S'inscrire</button>

              </div>
           </form>

           </div>


    </div>

 
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

        <div class="servicewhatsapp">
            
            <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967c-.273-.099-.471-.148-.67.15c-.197.297-.767.966-.94 1.164c-.173.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.018-.458.13-.606c.134-.133.298-.347.446-.52c.149-.174.198-.298.298-.497c.099-.198.05-.371-.025-.52c-.075-.149-.669-1.612-.916-2.207c-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372c-.272.297-1.04 1.016-1.04 2.479c0 1.462 1.065 2.875 1.213 3.074c.149.198 2.096 3.2 5.077 4.487c.709.306 1.262.489 1.694.625c.712.227 1.36.195 1.871.118c.571-.085 1.758-.719 2.006-1.413c.248-.694.248-1.289.173-1.413c-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214l-3.741.982l.998-3.648l-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" fill="#626262"/></svg>
            <div class="special-spacing"></div>
            <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.">Service client Paris</a>

        </div>

        <div class="servicewhatsapp">

            <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967c-.273-.099-.471-.148-.67.15c-.197.297-.767.966-.94 1.164c-.173.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.018-.458.13-.606c.134-.133.298-.347.446-.52c.149-.174.198-.298.298-.497c.099-.198.05-.371-.025-.52c-.075-.149-.669-1.612-.916-2.207c-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372c-.272.297-1.04 1.016-1.04 2.479c0 1.462 1.065 2.875 1.213 3.074c.149.198 2.096 3.2 5.077 4.487c.709.306 1.262.489 1.694.625c.712.227 1.36.195 1.871.118c.571-.085 1.758-.719 2.006-1.413c.248-.694.248-1.289.173-1.413c-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214l-3.741.982l.998-3.648l-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" fill="#626262"/></svg>
            <div class="special-spacing"></div>
            <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.">Service client Pointe-Noire</a>

            
        </div>

        <div class="servicewhatsapp">

            <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967c-.273-.099-.471-.148-.67.15c-.197.297-.767.966-.94 1.164c-.173.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.018-.458.13-.606c.134-.133.298-.347.446-.52c.149-.174.198-.298.298-.497c.099-.198.05-.371-.025-.52c-.075-.149-.669-1.612-.916-2.207c-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372c-.272.297-1.04 1.016-1.04 2.479c0 1.462 1.065 2.875 1.213 3.074c.149.198 2.096 3.2 5.077 4.487c.709.306 1.262.489 1.694.625c.712.227 1.36.195 1.871.118c.571-.085 1.758-.719 2.006-1.413c.248-.694.248-1.289.173-1.413c-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214l-3.741.982l.998-3.648l-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" fill="#626262"/></svg>
            <div class="special-spacing"></div>
            <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.">Service client Kinshasa</a>

            
        </div>

        <div class="servicewhatsapp">

            
            <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967c-.273-.099-.471-.148-.67.15c-.197.297-.767.966-.94 1.164c-.173.199-.347.223-.644.075c-.297-.15-1.255-.463-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059c-.173-.297-.018-.458.13-.606c.134-.133.298-.347.446-.52c.149-.174.198-.298.298-.497c.099-.198.05-.371-.025-.52c-.075-.149-.669-1.612-.916-2.207c-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372c-.272.297-1.04 1.016-1.04 2.479c0 1.462 1.065 2.875 1.213 3.074c.149.198 2.096 3.2 5.077 4.487c.709.306 1.262.489 1.694.625c.712.227 1.36.195 1.871.118c.571-.085 1.758-.719 2.006-1.413c.248-.694.248-1.289.173-1.413c-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214l-3.741.982l.998-3.648l-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884c2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" fill="#626262"/></svg>
            <div class="special-spacing"></div>
            <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.">Service client Brazzaville</a>

            
            
        </div>



</div>



  

  <!-- Vendor JS Files -->
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
  <script src="../assets/js/animation.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <script>
    const form = document.getElementById('formInscription');



    form.addEventListener('submit',function(e){
   

      for(let i = 0;i<form.length;i++){

        if(i>0 && i<3){

          let chaineNomOuPrenom = form[i].value;
          if(!chaineNomOuPrenom.match(/^[a-zA-Z]{3,}$/)){
            e.preventDefault();
            let parentNomOuPrenom = form[i].parentElement.id;
            let idParent = document.getElementById(`${parentNomOuPrenom}`);

            let spadn = document.createElement("span");
            spadn.textContent = "Erreur"; 
            idParent.appendChild(spadn);


          }
        }

        if(i == 3){
          let emailSaisie = form[i].value;
          if(!emailSaisie.match(/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/)){
            e.preventDefault();
            let emailId = form[i].parentElement.id;
            let idParentEmail = document.getElementById(`${emailId}`);

            let spanEmail = document.createElement("span");
            spanEmail.textContent = "Erreur email"; 
            idParentEmail.appendChild(spanEmail);
          }
        }

        if(i == 8){
          let nomInput  = form[i].name;
          let adresseEtatOuCodePostalSaisie = form[i].value;
          if(nomInput == "codePostal"){
            if(!adresseEtatOuCodePostalSaisie.match(/^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/)){
              e.preventDefault();
              let idParentCodePostal = document.getElementById('codePostal');
              let span = document.createElement("span");
              span.textContent = "Le code postal n'est pas conforme"; 
              idParentCodePostal.appendChild(span);

            }
          }
        }


      }

    });

    const pays =  document.getElementById('pays').children[1];

    pays.addEventListener('change', function(e){


      if(pays.value == "CD"){
        document.getElementById('codePostal').hidden = false;
        let p = document.getElementById('codePostal').children[0];
        let c = document.getElementById('codePostal').children[1];
        c.name = "etat";
        p.innerHTML = "Etat";

        let element = document.getElementById('adresse');
        element.classList.remove("col-lg-12");
        
      }
      else if (pays.value == "CG")
      {
        let p = document.getElementById('codePostal').hidden = true;
        let element = document.getElementById('adresse');
        element.classList.add("col-lg-12");
      }
      else {
        document.getElementById('codePostal').hidden = false;
        let p = document.getElementById('codePostal').children[0];
        let c = document.getElementById('codePostal').children[1];
        p.innerHTML = "Code Postal";
        c.name ="codePostal";

        let element = document.getElementById('adresse');
        element.classList.remove("col-lg-12");

      }
      



    });   




  </script>



  

</body>

</html>