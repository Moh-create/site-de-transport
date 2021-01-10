<?php
include_once '../boostrap.inc.php';


if(isset($_POST["email"]))
{
    $utilisateur = new Utilisateur();
    $utilisateur = Utilisateur::fetchByEmail($_POST["email"]);

    if($utilisateur != null)
    {
 
        $token = bin2hex(openssl_random_pseudo_bytes(6));
        $utilisateur->setToken($token);
        $utilisateur->save();

        $to      = 'mohamed.ahamadou@gmail.com';
        $subject = 'récupération de mot de passe';
        $message = 'Voici votre code : ' . $token;
        $headers = 'From: stage.bts.sio.conflans.aha@example.com';
   
        mail($to, $subject, $message, $headers);
        session_start();
        $_SESSION["token"] = $token;
        $_SESSION["email"] = $_POST["email"];
        header('location: ../View/recupererMotDePasse.php');

    }else{
        header('location: ../View/connexion.html');
        exit;
    }
}