<?php
include_once '../boostrap.inc.php';
session_start();


if(!empty($_POST['modePointRelais']) && !empty($_POST['pointRelais']) && isset($_POST['pointRelais']))
{
    
    $commande = new Commande();

    $commande->setDateCommande(time());

    $utilisateur = new Utilisateur();
    $utilisateur = Utilisateur::fetch($_SESSION['utilisateur']);

    $commande->setUtilisateur($utilisateur);

    $pointRelaisEurope = new PointRelais();
    $pointRelaisEurope = PointRelais::fetch($utilisateur->getPointRelais()->getId());
    $commande->setPointRelaisEurope($pointRelaisEurope);

    $pointRelaisAfrique = new PointRelais();
    $pointRelaisAfrique = PointRelais::fetch($_POST['pointRelais']);
    $commande->setPointRelaisAfrique($pointRelaisAfrique);

    $commande->save();

    header('location: ../View/commande.php');
    exit;

}
else if(!empty($_POST['modeLivraison'])){


    $commande = new Commande();

    $commande->setDateCommande(time());

    $utilisateur = new Utilisateur();
    $utilisateur = Utilisateur::fetch($_SESSION['utilisateur']);

    $commande->setUtilisateur($utilisateur);

    $pointRelaisEurope = new PointRelais();
    $pointRelaisEurope = PointRelais::fetch($utilisateur->getPointRelais()->getId());
    $commande->setPointRelaisEurope($pointRelaisEurope);

    $livraison = new Livraison();
    $livraison = Livraison::fetchByUtilisateur($_SESSION['utilisateur']);
    $commande->setLivraison($livraison);

    $commande->save();
    header('location: ../View/commande.php');
    exit;
}else{
    header('location: ../View/commande.php');
    exit; 
}