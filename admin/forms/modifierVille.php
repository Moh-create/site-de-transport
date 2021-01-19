<?php

include_once '../../boostrap.inc.php';

session_start();

$id = $_SESSION["idVille"];

if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["pays"]) && !empty($_POST["pays"])  && isset($_POST["afficher"]) && !empty($_POST["afficher"]))
{
    $ville = new Ville();
    $ville = Ville::fetch($id);

    $ville->setNomVille($_POST["nom"]);

    $pays = new Pays();
    $pays = Pays::fetch($_POST["pays"]);
    $ville->setPays($pays);

    if($_POST["afficher"] == "Oui"){
        $ville->setAfficher(1);

    }else{
        $ville->setAfficher(0);
    }

    $ville->update();

    header('location: ../View/ville/index.php');
}else{
    header('location: ../View/ville/index.php');
}


