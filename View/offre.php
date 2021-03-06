<?php

session_start();



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
        <h1 class="text-light"><a href="index.php">Pickme <span style="color: #3498d3;">up</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Accueil</a></li>
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

  <main id="main" style="padding-top: 5%;">
    <section id="services" class="services">
        <div class="container">
  
                <div class="section-title" data-aos="fade-up">
                    <h2>offres particuliers</h2>
                    <p class="pt-3">Commandez des produits sur des sites en ligne du monde entier et faites-vous livré à votre
                        domicile ou votre bureau à Brazzaville, Pointe-Noire et Kinshasa.</p>
                </div>

                <div class="row justify-content-md-center p-3">
                    <div class="choix-paiement align-items-center">
                        <button type="button" class="btn btn-outline-primary  mr-5" onclick="carteBancaire()">Avec Carte Bancaire</button>
                        <button type="button" class="btn btn-outline-primary"onclick="sansCarteBancaire()">Sans Carte Bancaire</button>
                    </div>
                </div>


            <div id="carteBancaire">
                <div class="row pt-5">
                    
                                <div class="col-lg-6">
                                    
                                    <div class="etape">
                                        <div class="cercle">
                                            <p class="text-center">1</p>                       
                                        </div>  
                                        <h2>Commander en ligne</h2>                         
                                    </div>
                                    <p class="text-justify pt-3">Commandez en ligne sur le site de votre choix en utilisant l’adresse de relais fournie
                                        par notre service.</p>
                                    
                                        <div class="etape pt-4">
                                            <div class="cercle">
                                                <p class="text-center">2</p>                       
                                            </div>  
                                            <h2>Transmettre la commande</h2>                         
                                        </div>
                                        <p class="text-justify pt-3">Transmettez-nous la confirmation de la commande, vous recevrez ensuite un mail de
                                            confirmation ainsi que les différentes instructions.</p>
                                        
                                            <div class="etape pt-4">
                                                <div class="cercle">
                                                    <p class="text-center">3</p>                       
                                                </div>  
                                                <h2>Réception de la commande</h2>                         
                                            </div>
                                            <p class="text-justify pt-3">Nous réceptionnant votre commande sur nos points de relais en Europe et nos vous
                                                réexpédions à votre domicile ou votre bureau à Brazzaville, Pointe-Noire et Kinshasa.</p>
                                            
                                            

                                </div>
                            
                                <div class="col-lg-6 align-items-center mt-5">
                                    <img src="../assets/img/card-1673581_1280.png" class="img-fluid ml-5" alt="..." height="300" width="300">
                                </div>

                    </div>

                </div>
                

            <div id="sansCarte">
                 <div class="row pt-5">

                            <div class="col-lg-6">                       
                                    <div class="etape">
                                        <div class="cercle">
                                            <p class="text-center">1</p>                       
                                        </div>  
                                        <h2>Contacter</h2>                         
                                    </div>
                                    <p class="text-justify pt-3">Contactez notre service clientèle au +242 064 000 000</p>
                                    
                                    <div class="etape pt-4">
                                        <div class="cercle">
                                            <p class="text-center">2</p>                       
                                        </div>  
                                            <h2>Allez sur le site web votre choix</h2>                         
                                        </div>
                                        <p class="text-justify pt-3">Allez sur le site internet votre choix, sélectionner vos achats, Envoyez-nous le lien des
                                            produits sélectionner sur whatApps + 242 064 000 000 ou à l’adresse mail suivante :
                                            contact@gmail.com</p>
                                        
                                        <div class="etape pt-4">
                                            <div class="cercle">
                                                <p class="text-center">3</p>                       
                                            </div>  
                                                <h2>pick me up</h2>                         
                                        </div>
                                            <p class="text-justify pt-3">PICK ME UP se charge d’acheter les produits</p>

                                        <div class="etape pt-4">
                                            <div class="cercle">
                                                <p class="text-center">4</p>                       
                                            </div>  
                                                <h2>Réception de la commande</h2>                         
                                        </div>
                                            <p class="text-justify pt-3">Nous réceptionnons votre commande et la livrons à votre domicile, au bureau ou
                                                    dans nos points relais.</p>
                            </div>

                                                        
                            <div class="col-lg-6 align-items-center mt-5">
                                <img src="../assets/img/no-credit-card.png" class="img-fluid ml-5" alt="..."height="400" width="200">
                            </div>

                    </div>
                </div> 

          </div>
      </section><!-- End Services Section -->


      <section id="features" class="features">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>business solutions </h2>
          </div>


          <div class="row justify-content-md-center p-3">
            <div class="choix-paiement align-items-center">
                <button type="button" class="btn btn-outline-primary btn-sm mr-3" onclick="ecommerce()">E-commerce/Entreprise</button>
                <button type="button" class="btn btn-outline-primary btn-sm mr-3" onclick="colis()">Envoyer en colis, courrier</button>
                <button type="button" class="btn btn-outline-primary btn-sm " onclick="stockage()">Stockage, archivage de document</button> 
            </div>
        </div>


        <div id="ecommerce-entreprise">
            <h4 class="text-center pt-2">GESTION RAPIDE, PRECISE ET EFFICACE DE VOS COMMANDES </h4>
            <div class="row pt-3">

              <div class="col-lg-6 text-justify">
             <p>Une gestion optimale des commandes passées en ligne nécessite un niveau élevé de visibilité
              et de performance des stocks. De la gestion des stocks à la gestion des actifs, de la préparation
              de commande guidée par la voix à la confirmation de livraison, la solution Pickme up peut
              réaliser la meilleure gestion des commandes en e-commerce, vous permettant de maîtriser la
              portée des processus très rapides et exigeants, quel que soit le client et partout où, les articles
              doivent être livrés dès que possible.<br>
              <strong>(Vous souhaitez boostez votre activité ? Optimiser votre site e-commerce ?)</strong></p>

              </div>

              <div class="col-lg-6">
                <img src="../assets/img/desk-2037545_1280.png" class="img-fluid" alt="Responsive image">
              </div>
            </div>

            <h2 class="text-center" style="font-weight: bold; font-size: 32px;">Contacter nous </h2>

            <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">

                 <form action="../forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>

                  <div class="form-group">
                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Votre numero" />
                    <div class="validate"></div>
                  </div>

                  <div class="form-group">
                    <select class="form-control" aria-label="Default select example" name="subject">
                      <option selected>Objet de la demande :</option>
                      <option>Archivage physique</option>
                      <option >Archivage électronique</option>
                      <option>Conseil en archivage</option>
                      <option >Dématérialisation de documents</option>
                      <option>Autre</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validate"></div>
                  </div>

                  <div class="alert alert-success contact__msg" style="display: none" role="alert">
                    Your message was sent successfully.
                  </div>
                  <div class="text-center"><button class=" btn btn-primary"type="submit">Envoyer un Message</button></div>
                </form> 
              
              </div>
        </div>
        

        <div id="envoyer-un-colis">
            <h4 class="text-center pt-2">FAITES COLLECTER VOTRE COURRIER DEPUIS VOTRE BUREAU</h4>
            <div class="row">
              <div class="col-lg-6">
                <p>Vous avez une lettre importante à poster ? Pas de panique, grâce à notre service de collecte de
                  courrier dans votre bureau ou à domicile, vous pouvez envoyer du courrier ou des colis sans
                  vous déplacer. Notre facteur s&#39;occupe de tout.
                  (Transport national &amp; envoi en 48h – Envoyer une lettre recommandée ou un colis à distance)</p>
              </div>
              <div class="col-lg-6">
                <img src="../assets/img/card-with-blue-envelope.jpg" class="img-fluid" alt="Responsive image" height="250" width="250">
              </div>
            </div>

            <h2 class="text-center" style="font-weight: bold; font-size: 32px;">Contacter nous </h2>

            <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <form action="../forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
    
                  <div class="form-group">
                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Votre numero" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Object" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validate"></div>
                  </div>
                  <div class="alert alert-success contact__msg" style="display: none" role="alert">
                    Your message was sent successfully.
                  </div>
                  <div class="text-center"><button class=" btn btn-primary"type="submit">Envoyer un Message</button></div>
                </form>
              </div>

        </div>

        <div id="stockage">
          <h4 class="text-center pt-2">GAGNEZ DU TEMPS, DE L’ESPACE ET MAITRISER VOS COÜTS</h4>

          <div class="row">
            <div class="col-lg-6">
              <p>Devenez une entreprise digitale et gagnez du temps en enregistrant vos factures, en
                numérisant vos contrats ainsi qu&#39;en approuvant des documents en ligne. Nos solutions
                d&#39;archivage vous permettent de protéger les données électroniques, de réduire les coûts
                grâce à la dématérialisation des fichiers et de mener des consultations sécurisées à tout
                moment et en tout lieu. Nous confier vos archives de fichiers, c&#39;est opter pour une gestion
                optimisée, un stockage sécurisé et une disponibilité instantanée dans un bâtiment certifié.</p>
            </div>
            <div class="col-lg-6">
              <img src="../assets/img/book-2943383_1280.png" class="img-fluid" alt="Responsive image" >
            </div>
          </div>

          <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="../forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <input type="number" class="form-control" name="numero" id="numero" placeholder="Votre numero" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Object" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your message was sent successfully.
              </div>
              <div class="text-center"><button class=" btn btn-primary"type="submit">Envoyer un Message</button></div>
            </form>
          </div>

          
        </div>





        </div>
      </section><!-- End Features Section -->


      <section id="features" class="features">
        <div class="container"> 
          <div class="section-title" data-aos="fade-up">
            <h2>Livreur Express</h2>
            <p>Commandez votre coursier en 2min par téléphone. Livraison en 2h max. Paiement à la course.</p>
            </div>
            <div class="row ">
              <div class="col-lg-6 ">                       
                <div class="etape mt-3">
                    <div class="cercle">
                        <p class="text-center">1</p>                       
                    </div>  
                    <h2>Livraison de repas</h2>                         
                </div>

                <div class="etape pt-4">
                    <div class="cercle">
                        <p class="text-center">2</p>                       
                    </div>  
                        <h2>Livraison de course à domicile</h2>                         
                    </div>
                    
                    <div class="etape pt-4">
                        <div class="cercle">
                            <p class="text-center">3</p>                       
                        </div>  
                            <h2>Livraison médicament</h2>                         
                    </div>
                    <div class="etape pt-4">
                        <div class="cercle">
                            <p class="text-center">4</p>                       
                        </div>  
                            <h2>Diverses courses</h2>                         
                    </div>
                </div>

                <div class="col-lg-6">
                  <img src="../assets/img/3957701.jpg" class="img-fluid" alt="Responsive image" >
                </div>
              </div>

              <div class="row justify-content-md-center p-4">
                <div class="choix-paiement align-items-center">
                    <button type="button" class="btn btn-outline-primary  mr-3"><a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.">Démmarer une course</a></button>
                    <button type="button" class="btn btn-outline-primary mr-3" onclick="livreur()">Devenir livreur</button>
                </div>
            </div>


            <div id="devenirLivreur">

              <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="300">

                <form action="../forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Object" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                  </div>
    
                  <div class="form-group">
                    <input type="number" class="form-control" name="numero" id="numero" placeholder="Votre numéro de téléphone" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="permis" id="permis" placeholder="numéro de permis" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                  </div>

                  <div class="alert alert-success contact__msg" style="display: none" role="alert">
                    Your message was sent successfully.
                  </div>

                  <div class="text-center"><button class=" btn btn-primary"type="submit">Envoyer un Message</button></div>
                </form>
              </div>
            </div>
        </div>

      </section>
    </main>
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
      document.getElementById('sansCarte').hidden = true;
      document.getElementById('envoyer-un-colis').hidden = true;
      document.getElementById('stockage').hidden = true;
      document.getElementById('devenirLivreur').hidden = true;
      function sansCarteBancaire(){

        document.getElementById('sansCarte').hidden = false;
        document.getElementById('carteBancaire').hidden = true;
        
      }

      function carteBancaire(){
        document.getElementById('sansCarte').hidden = true;
        document.getElementById('carteBancaire').hidden = false;
      }


      function colis(){
          document.getElementById('envoyer-un-colis').hidden = false;
          document.getElementById('ecommerce-entreprise').hidden = true;
          document.getElementById('stockage').hidden = true;

      }

      function ecommerce(){

        document.getElementById('envoyer-un-colis').hidden = true;
        document.getElementById('stockage').hidden = true;
        document.getElementById('ecommerce-entreprise').hidden = false;

      }

      function stockage(){
        
        document.getElementById('stockage').hidden = false;
        document.getElementById('envoyer-un-colis').hidden = true;
        document.getElementById('ecommerce-entreprise').hidden = true;
      }

      function livreur(){
        if(document.getElementById('devenirLivreur').hidden  == false){
          document.getElementById('devenirLivreur').hidden = true;
        }else{
          document.getElementById('devenirLivreur').hidden = false;
        }
      }

      
</script>

</body>

</html>