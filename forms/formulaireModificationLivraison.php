<?php
include_once '../boostrap.inc.php';
session_start();

if(isset($_POST["adresseRue"]) && isset($_POST["ville"]) &&  isset($_POST["etat"]) && isset($_POST["telephone"]))
{
 
    $livraison = $_SESSION["objLivraison"];

    $livraison->setAdresseRue($_POST["adresseRue"]);
    $livraison->setEtat($_POST["etat"]);
    $livraison->setTelephone($_POST["telephone"]);
    $ville = new Ville();
    $ville = Ville::fetch($_POST["ville"]);
    $livraison->setVille($ville);

    $livraison->save();

    header('location : ../View/mesInformations.php');
    exit;


}
else {
    header('location : ../View/mesInformations.php');
    exit;
}