<?php
include_once '../../boostrap.inc.php';


if(isset($_POST["codePays"]) && !empty($_POST["codePays"]) && isset($_POST["nomPays"]) && !empty($_POST["nomPays"]))
{
    $pays = new Pays();
    $pays->setCodePays($_POST["codePays"]);
    $pays->setNomPays($_POST["nomPays"]);
    $pays->insert();

    header('location: ../View/pays/index.php');
}