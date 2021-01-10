
<?php
include_once '../boostrap.inc.php';
session_start();

if(!empty($_POST['token']) && isset($_POST['token']) && !empty($_POST['motDePasse']) && isset($_POST['motDePasse']))
{

    if($_POST['token'] == $_SESSION["token"])
    {
        $utilisateur = new Utilisateur();
        $utlisateur = Utilisateur::fetchByEmail($_SESSION["email"]);

        $motDePasse = password_hash($_POST["motDePasse"],PASSWORD_BCRYPT);

        $utlisateur->setMotDePasse($motDePasse);
        $utlisateur->save();

        header('location: ../View/connexion.html');
        exit;
    }else{
        header('location: ../View/motDePasseOublie.php');
        exit;
    }

}else{
    header('location: ../View/motDePasseOublie.php');
    exit;
}