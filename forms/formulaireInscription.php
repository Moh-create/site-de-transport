<?php



include_once '../boostrap.inc.php';

if( isset($_POST["genre"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["motDePasse"])  && isset($_POST["numeroIndicatif"]) && isset($_POST["telephone"])  && isset($_POST["adresseRue"]) && isset($_POST["ville"]) && isset($_POST["pays"])){
    $email = $_POST["email"];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: ../View/inscription.html');
        exit;
    }

    $motDePasse = password_hash($_POST["motDePasse"],PASSWORD_BCRYPT);
    $telephone = $_POST["numeroIndicatif"].$_POST["telephone"];

    $utilisateur = new Utilisateur();
    $utilisateur->setGenre($_POST["genre"]);
    $utilisateur->setNom($_POST["nom"]);
    $utilisateur->setPrenom($_POST["prenom"]);
    $utilisateur->setEmail($_POST["email"]);
    $utilisateur->setMotDePasse($motDePasse);
    $utilisateur->setTelephone($telephone);
   
    if(isset($_POST["codePostal"])){
         $utilisateur->setAdressePostal($_POST["codePostal"]);
    }

   
    if(isset($_POST["etat"])){
        $utilisateur->setEtat($_POST["etat"]);
   }

    



    $ville = new Ville();
    $ville = $ville::fetch($_POST["ville"]);
    $utilisateur->setAdresseVille($ville);
    $utilisateur->setAdresseRue($_POST["adresseRue"]);

    $utilisateur->save();



}
?>