
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title></title>
 </head>
<body>
 <?php
      
                 include_once 'boostrap.inc.php';


                 $utilisateur = new Utilisateur();//initialisation d'un objet de type Categorie
                 $utilisateur->setGenre("M");
                 $utilisateur->setNom("fgdfgd");
                 $utilisateur->setPrenom("DUPONT");
                 $utilisateur->setEmail("dfdf@gfgg.com");
                 $utilisateur->setMotDePasse("test");
                 $utilisateur->setTelephone("012525555");
                 $utilisateur->setAdresseRue("fdfdfdfsfs");
                 $utilisateur->setAdressePostal("78520");
                 $v = new Ville();
                 $v = Ville::fetch('PA');
                 $utilisateur->setAdresseVille($v);
                 $utilisateur->save();



 ?>
 </body>