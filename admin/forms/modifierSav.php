<?php

include_once '../../boostrap.inc.php';

session_start();

$id = $_SESSION["idSav"];

if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["telephone"]) && !empty($_POST["telephone"])  && isset($_POST["ville"]) && !empty($_POST["ville"]))
{
    $sav = Sav::fetch($id);
    $sav->setNom($_POST["nom"]);
    $sav->setNumero($_POST["telephone"]);
    $ville = Ville::fetch($_POST["ville"]);

    $sav->setVille($ville);

    $sav->save();


    header('location: ../View/sav/index.php');
}else{
    header('location: ../View/sav/index.php');
}
