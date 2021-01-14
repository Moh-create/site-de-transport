<?php
include_once '../../boostrap.inc.php';


if(isset($_POST["codeVille"]) && !empty($_POST["codeVille"]) && isset($_POST["pays"]) && !empty($_POST["pays"]) && isset($_POST["nomVille"]) && !empty($_POST["nomVille"]))
{
    $ville = new Ville();
    $ville->setCodeVille($_POST["codeVille"]);
    $ville->setNomVille($_POST["nomVille"]);
    $pays = new Pays();
    $pays = Pays::fetch($_POST["pays"]);
    $ville->setPays($pays);
    $ville->insert();

    header('location: ../View/ville/index.php');
}