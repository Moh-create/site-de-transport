<?php
include_once '../boostrap.inc.php';
session_start();

$userId = $_SESSION["utilisateur"];

if(isset($_POST["motDePasse"]) && !empty($_POST["motDePasse"]))
{ 

    $utilisateur = new Utilisateur();

    $utilisateur = Utilisateur::fetch($userId);

    if(password_verify($_POST["motDePasse"],$utilisateur->getMotDePasse()))
    {

        $resultat = $utilisateur->delete();
        session_destroy();
        header('location: ../View/mesInformations.php');
    }else{
        header('location: ../View/index.php');
    }

}
else {
    header('location: ../View/mesInformations.php');
}


