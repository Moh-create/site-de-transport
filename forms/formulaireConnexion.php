<?php

include_once '../boostrap.inc.php';

if(!empty($_POST['email']) && !empty($_POST['motDePasse'])){

    

    $user = Utilisateur::fetchByEmail($_POST['email']);

    if(isset($user)){
        $verfication = password_verify($_POST['motDePasse'],$user->getMotDePasse());

        if($verfication == true){

            session_start();
            $_SESSION["utilisateur"]= $user->getId();
            header('location: ../View/index.php');
            
        }
        else {
            echo "le mot de passe est incorrecte";
            header('location: ../View/connexion.html');
        }

    }

}else {
    
    header('location: ../View/connexion.html');
}

?>