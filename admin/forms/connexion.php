<?php

include_once '../../boostrap.inc.php';

if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["motDePasse"]) && !empty($_POST["motDePasse"]))
{
    $collectionUserAdmin = UserAdmin::fetchAll();

    foreach($collectionUserAdmin as $userAdmin){
        if($_POST["nom"] == $userAdmin->getNom()){
            var_dump($userAdmin);
            if(password_verify($_POST["motDePasse"],$userAdmin->getMotDePasse())){
                session_start();
                $_SESSION["userAdmin"] = $userAdmin->getId();
                header('Location: ../View/menu.php');
                exit;
            }else{
                header('location: ../View/index.php');
            }
        }
    }
    
}else{
    header('location: ../View/index.php');
}