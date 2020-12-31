<?php
include_once '../boostrap.inc.php';
session_start();

if(isset($_POST["nom"]) && isset($_POST["prenom"]) &&  isset($_POST["email"]) && isset($_POST["ville"])  &&  isset($_POST["adresseRue"]))
{
 
    $utilisateur = $_SESSION["objUser"];

    $utilisateur->setNom($_POST["nom"]);
    $utilisateur->setPrenom($_POST["prenom"]);
    $utilisateur->setEmail($_POST["email"]);
    $utilisateur->setAdresseRue($_POST["adresseRue"]);

    $ville = new Ville();
    $ville = Ville::fetch($_POST["ville"]);
    $utilisateur->setAdresseVille($ville);

    $utilisateur->save();

    unset($_SESSION["objUser"]);

    header('location: ../View/mesInformations.php');
    exit;
}
else {
    header('location: ../View/mesInformations.php');
    exit;
 
}


