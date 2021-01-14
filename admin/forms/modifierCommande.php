<?php

include_once '../../boostrap.inc.php';

session_start();

$id = $_SESSION["id"];


if(isset($_POST["etat"]) && !empty($_POST["etat"]))
{
    $commande = new Commande();
    $commande = Commande::fetch($id);

    $commande->setEtat($_POST["etat"]);
    $commande->save();
    header('location: ../View/commande/index.php');
    unset($_SESSION["id"]);
    

}else {
    header('location: ../View/commande/index.php');
}