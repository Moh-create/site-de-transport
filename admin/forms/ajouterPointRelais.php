<?php



if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["adresseRue"]) && !empty($_POST["adresseRue"]) && isset($_POST["pays"]) && !empty($_POST["pays"]))
{
    $ville = new Ville();
    $ville->setCodeVille($_POST["codeVille"]);
    $ville->setNomVille($_POST["nomVille"]);
    $pays = new Pays();
    $pays = Pays::fetch($_POST["pays"]);
    $ville->setPays($pays);
    $ville->insert();

    header('location: consulter.php');
}