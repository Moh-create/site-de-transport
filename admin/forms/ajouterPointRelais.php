<?php

include_once '../../boostrap.inc.php';

if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["adresseRue"]) && !empty($_POST["adresseRue"]) && isset($_POST["pays"]) && !empty($_POST["pays"]))
{
   

    $pointRelais = new PointRelais();
    $pointRelais->setNom($_POST["nom"]);
    $pointRelais->setAdresseRue($_POST["adresseRue"]);
    $pays = new Pays();
    $pays = Pays::fetch($_POST["pays"]);
    $pointRelais->setPays($pays);

    if(!empty($_POST["adresseVille"])){
        $pointRelais->setAdresseVille($_POST["adresseVille"]);
    }
    if(!empty($_POST["adressePostal"])){
        $pointRelais->setAdresseCodePostal($_POST["adressePostal"]);
    }
    $pointRelais->save();

    header('location: ../View/pointrelais/index.php');

}else{
    header('location: ../View/pointrelais/index.php');
}