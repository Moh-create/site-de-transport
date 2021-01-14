<?php

include_once '../../boostrap.inc.php';

session_start();

$id = $_SESSION["idPointRelais"];

if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["adresse"]) && !empty($_POST["adresse"])  && isset($_POST["pays"]) && !empty($_POST["pays"]) && isset($_POST["afficher"]) && !empty($_POST["afficher"]))
{
    $pointRelais = new PointRelais();
    $pointRelais = PointRelais::fetch($id);

    $pointRelais->setNom($_POST["nom"]);
    $pointRelais->setAdresseRue($_POST["adresse"]);
    $pays = Pays::fetch($_POST["pays"]);
    $pointRelais->setPays($pays);

    if($_POST["afficher"] == "Oui"){
        $pointRelais->setAfficher(1);

    }else{
        $pointRelais->setAfficher(0);
    }


    if(isset($_POST["ville"]) && !empty($_POST["ville"])){
        $pointRelais->setAdresseVille($_POST["ville"]);
    }

    if(isset($_POST["codePostal"]) && !empty($_POST["codePostal"])){
        $pointRelais->setAdresseCodePostal($_POST["codePostal"]);
    }

    $pointRelais->save();

    header('location: ../View/pointrelais/index.php');

}else{
    header('location: ../View/pointrelais/index.php');
}


