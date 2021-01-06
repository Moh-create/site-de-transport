<?php 
session_start();
include_once '../boostrap.inc.php';
if(isset($_POST['adresseRue']) && isset($_POST['ville']) && isset($_POST['etat']) && isset($_POST['telephone']))
{
    $livraison = new Livraison();

    $livraison->setAdresseRue($_POST['adresseRue']);
    

    $ville = new Ville();
    $ville = Ville::fetch($_POST['ville']);

    $livraison->setVille($ville);

    $livraison->setEtat($_POST['etat']);
    $livraison->setTelephone($_POST['telephone']);

    $utilisateur = new Utilisateur();
    $utilisateur = Utilisateur::fetch($_SESSION['utilisateur']);

    $livraison->setUtilisateur($utilisateur);

    $livraison->save();

    header('location: ../View/mesInformations.php');
    exit;
}else {
    header('location: ../View/mesInformations.php');
    exit;
}